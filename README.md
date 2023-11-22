# E-learning-platform-in-laravel
- This website is an e-learning platform, developed with Laravel 9. The website offers a comprehensive learning experience with three distinct user roles: visitors, administrators, and students.
- Every user has different and restricted (Admin and student) view.

## Admin
- Can perform CRUD operations on users and assign roles to them.
- Can perform CRUD operations on courses.
- Can access the pages of courses listing and user listing.

## Student
- Can view basic info of all courses like title, general description (not the actual course data), creation date.
- Can enroll in the course desired.
- Can only read course contents which he/she is enrolled in.
- Has student dashboard where he/she can see all the enrolled courses.
- Can contact the admin for informations.

## Guest/Visitor
- Can view listing of all the courses.
- Can register as a author or student.
- Can contact the admin for informations.
