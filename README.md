# Geomiq Project

## Setup Instructions:

1. **Clone or Download:**
   - If you have Git installed, clone the repository using `git clone [repository-url]`.
   - Otherwise, download the project as a zip folder and extract it.

2. **Navigate to Project Directory:**
cd geomiq-backend

3. **Install Dependencies:**
composer install

4. **Database Setup:**
- Create a MySQL database named `geomiq`.
- Run migrations:
  ```
  php artisan migrate
  ```
- Seed the database using:
  ```
  php artisan db:seed CustomSeeder
  ```

5. **Run the Laravel Development Server:**
php artisan serve

6. **Test the API (Part A):**
- Use a tool like Postman to test the endpoint: `http://127.0.0.1:8000/api/parse-string`.

6. **Run PArseString Command (Part A):**
- To run the ParseString command, use the following: 
`php artisan parse:string "elapsed_time=0.0022132396697998047, type-CNC,radius-1-15,position-1=0.000000000000014,position-1//90,position-2=0%direction-1=-2.0816681711721685e-16"`.

---

## Assumptions:

In developing this project, I made a few assumptions to streamline the process and focus on specific aspects:

- Input Format: I assumed that the input for the StringParserController in Part A would follow a specific format, as mentioned in the assignment instructions. In a real-world scenario, I would likely enhance the code to handle a broader range of input formats or provide clearer error messages for unsupported formats.

- Database Connection: I assumed that users would have a MySQL database available and configured properly. Instructions were provided for setting up the database, but in a production environment, additional considerations may be necessary.

- Use of Postman: For testing the API endpoint in Part A, I assumed users would use tools like Postman. If a different testing approach is preferred, additional instructions or alternative methods might be provided.

---

## Time Spent on the Test:

I invested approximately 8 hours in completing the test.

---

## What I'd Do Given More Time:

1. **Code Optimization:**
- Review and optimize the code for enhanced performance and scalability.

2. **Additional Testing:**
- Conduct more extensive testing to cover various edge cases and potential scenarios.

3. **Documentation:**
- Provide more comprehensive documentation, including inline comments for future maintenance.

4. **Refinement of Edge Cases:**
- Further refine handling for edge cases to enhance overall reliability.

---

## What I Thought of the Test:

The test provided a practical and engaging opportunity to showcase my skills in Laravel and database management. The assignments were well-structured, presenting real-world scenarios that allowed me to demonstrate problem-solving abilities. The diversity of tasks, involving both string parsing and database operations, made the test intellectually stimulating. Overall, I found it to be a valuable assessment that aligns with real-world development challenges.

---

## About Me (JSON Format):

```
{
"name": "Ilir Peci",
"role": "Software Developer",
"experience": "Nearly 3 years in software development",
"skills": ["Laravel", "PHP", "MySQL", "Database Management", "Problem Solving"],
"interests": ["Web Development", "AI", "Open Source Projects"],
"languages": ["English", "Albanian"],
"linkedin": "https://www.linkedin.com/in/ilir-peci-b4b728248/",
"about": "Passionate and detail-oriented software developer with expertise in Laravel and a proven track record of delivering high-quality solutions. Committed to continuous learning and staying updated with industry trends."
}