# Senior Software Engineer Take-Home Practical

Welcome to the Senior Software Engineer take-home assignment. We're very excited you've applied to be a part of our team! 

This project provides a starter Laravel application that uses Blade templates, similar to our core application. The assignment is divided into three parts, each building on the previous one. You have 24 hours to complete as much as possible. Please don't fret if you feel you won't complete the assignment, the goal is simply to assess where you are at. Please do not feel you need to work on the project for more than a couple of hours at most. 

## Table of Contents
- [Overview](#overview)
- [Installation Instructions](#installation-instructions)
- [Assignment 1: Styling the Front End with Tailwind CSS](#assignment-1-styling-the-front-end-with-tailwind-css)
- [Assignment 2: API Integration with Object-Oriented PHP](#assignment-2-api-integration-with-object-oriented-php)
- [Assignment 3: Enhancing the Application with Livewire](#assignment-3-enhancing-the-application-with-livewire)
- [Submission Guidelines](#submission-guidelines)
- [Notes](#notes)

## Overview

This assignment evaluates your skills with Laravel, Blade, Livewire, Alpine.js, Tailwind CSS, and object-oriented PHP. Each assignment builds on the same starter code, progressively increasing in complexity:

1. **Styling the Front End** – Enhance a provided unstyled Blade view with Tailwind CSS.
2. **Backend API Integration** – Create an object-oriented PHP service that interfaces with an external API.
3. **Livewire Component** – Implement a dynamic feature using Laravel Livewire (with Alpine.js support where needed).

## Project Installation Instructions

1. **Clone the repository:**
    ```bash
    git clone <repo_url>
    cd senior-engineer-takehome
    ```

2. **Install Composer dependencies:**
    ```bash
    composer install
    ```

3. **Install NPM dependencies:**
    ```bash
    npm install
    ```

4. **Compile assets:**
    ```bash
    npm run dev
    ```

5. **Environment Setup:**
    - Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    - Generate the application key:
        ```bash
        php artisan key:generate
        ```

6. **Serve the application locally:**
    ```bash
    php artisan serve
    ```

7. **Open your browser** and navigate to `http://localhost:8000` to see the unstyled starter page.

## Assignment 1: Styling the Front End with Tailwind CSS

**Objective:**  
Improve the provided Blade view(s) by incorporating Tailwind CSS to create a modern, responsive design.

**Tasks:**
- **Integrate Tailwind CSS:**  
  You may choose to add Tailwind via CDN (for quick setup) or integrate it into your build process using NPM and PostCSS.
- **Style the Blade Template:**  
  Update `resources/views/welcome.blade.php` (and any other view if needed) to include:
  - A responsive navigation bar with a link to the application home and an external link to `https://google.com`.
  - A visually appealing content area. This is a weather dashboard. We know you are not a designer, but just provide the basics of a UI for a weather dashboard based off of your instincts.
  - A footer with social media icons and a copyright year 
  - Mobile-first responsive design adjustments
- **Accessibility & Design:**  
  Ensure that your design is accessible and follows best practices.

**Deliverable:**  
A styled front end that clearly demonstrates your proficiency with Tailwind CSS and demonstrates your approach to UI layout.

## Assignment 2: API Integration with Object-Oriented PHP

**Objective:**  
Implement an object-oriented PHP service that fetches weather data from a public API and integrate it into your styled dashboard.

**Tasks:**
- **Select an API:**  
  - Utilize the free forecast api at https://open-meteo.com/en/docs to create access to a weather API. This open source API provided up to 10K calls per day, which should be far more than needed to complete the project. 
- **Create a Service Class:**  
  - Create a new services directory in the application. 
  - Write an object-oriented PHP class (e.g., `ApiService.php`) that handles:
      - Making HTTP requests to the API.
      - Parsing the JSON response.
      - Handling potential errors gracefully.
- **Controller Integration:**  
  - Create a controller in the app to use your service class.
  - Pass the retrieved data to your Blade view from part 1 for rendering into the dashboard.
- **Best Practices:**  
  Use dependency injection and proper separation of concerns.

**Deliverable:**  
A working API integration that displays the parsed data on a web page.

## Assignment 3: Enhancing the Application with Livewire

**Objective:**  
Add a dynamic feature to the application using Laravel Livewire, demonstrating real-time interactivity without full page reloads.

**Tasks:**
- **Livewire Setup:**  
  - Install and configure Livewire in the project.
- **Develop a Livewire Component:**  
  - Create a Livewire component (e.g., `WeatherSearchComponent`) in the appropriate directory.
  - This component should include:
      - An input field (or dropdown) where users can enter or select a city.
      - A "Search" button (or live update as the user types) that triggers an action.
      - A loading indicator (optionally enhanced with Alpine.js) while data is being fetched.
- **Dynamic Data Fetching:**  
  - In the Livewire component's action method (e.g., searchCity), call your WeatherService to fetch the weather data for the entered city.
  - Update the component's properties with the new weather data.
  - Display the updated data in the component's view, replacing the default information.

- **Validation & Error Handling:**  
  - Validate the city input and display user-friendly error messages if needed.
  - Optionally, use Alpine.js for UI enhancements (like transitions or toggling between loading and results).

**Deliverable:**  
An interactive weather dashboard where users can enter a city name and see the page update in real time with the latest weather data from Open-Meteo, demonstrating your proficiency with Livewire and dynamic front-end integration

## Submission Guidelines

- **Time Limit:** 24 hours from the time you receive this assignment.
- **Commit Often:** Please commit your progress with clear, descriptive commit messages.
- **Documentation:** Include any assumptions, additional instructions, or setup details in a `NOTES.md` file.
- **Final Submission:** Provide us with access to your repository URL upon completion.

## Notes

- **Scope:** You are encouraged to complete as much as possible within the time limit, but don't feel the need to work more than a couple of hours. Completing the full assignment is not required. We value clean code, best practices, and maintainability.
- **Clarifications:** If you have any questions or need clarifications during the assignment, feel free to ask.
- **Good Luck:** We look forward to reviewing your work and discussing your approach during the code review session.

Happy coding!