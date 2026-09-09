<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // include the job data from the JSON file
        $jobData             = json_decode(file_get_contents(database_path('data/job_data.json')), true);
        $jobApplicationsData = json_decode(file_get_contents(database_path('data/job_applications.json')), true);

        // Create the admin user
        User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name'     => 'Admin',
            'role'     => 'admin',
            'password' => bcrypt('123456789'),

        ]);
        // Create the company-owner user

        // Create the job categories
        foreach ($jobData['jobCategories'] as $category) {
            JobCategory::firstOrCreate([
                'name' => $category,
            ]);
        }

        // Create the companies and associate them with the company-owner user
        foreach ($jobData['companies'] as $company) {
            $companyOwner = User::firstOrCreate([
                'email' => fake()->unique()->safeEmail(),
            ], [
                'name'     => fake()->name(),
                'role'     => 'company_owner',
                'password' => bcrypt('123456789'),

            ]);
            Company::firstOrCreate([
                'name' => $company['name'],
            ], [
                'address'  => $company['address'],
                'industry' => $company['industry'],
                'website'  => $company['website'],
                'user_id'  => $companyOwner->id,
            ]);
        }

        // Create the job vacancies and associate them with the companies and categories

        foreach ($jobData['jobVacancies'] as $vacancy) {
            $company_id = Company::where('name', $vacancy['company'])->firstOrFail()->id;

            $category_id = JobCategory::where('name', $vacancy['category'])->firstOrFail()->id;
            JobVacancy::firstOrCreate([
                'title'      => $vacancy['title'],
                'company_id' => $company_id,
            ], [
                'description' => $vacancy['description'],
                'location'    => $vacancy['location'],
                'type'        => $vacancy['type'],
                'salary'      => $vacancy['salary'],

                'category_id' => $category_id,
            ]);
        }


        // Create the job applications and associate them with the job vacancies and users
        foreach ($jobApplicationsData['jobApplications'] as $application) {

            $jobVacancyId = JobVacancy::inRandomOrder()->first()->id;

            // create job seeker user
            $userId = User::firstOrCreate([
                'email' => fake()->unique()->safeEmail(),
            ], [
                'name'     => fake()->name(),
                'role'     => 'job_seeker',
                'password' => bcrypt('123456789'),
            ])->id;

            // create a resume for the job seeker user
            $resume = Resume::Create([
                'user_id' => $userId,
                'file_name' => $application['resume']['filename'],
                'file_uri' => $application['resume']['fileUri'],
                'contact_details' => $application['resume']['contactDetails'],
                'skills' => $application['resume']['skills'],
                'summary' => $application['resume']['summary'],
                'experience' => $application['resume']['experience'],
                'education' => $application['resume']['education'],
            ]);

            JobApplication::Create([
                'job_vacancy_id' => $jobVacancyId,
                'user_id'        => $userId,
                'status'                => $application['status'],
                'ai_generated_score'    => $application['ai_generated_score'],
                'ai_generated_feedback' => $application['ai_generated_feedback'],
                'resume_id'             => $resume->id,
            ]);
        }
    }
}

