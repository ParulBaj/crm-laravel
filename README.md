# Command Used and steps

1. copy .env.example and change it to .env and setup db settings

2. php artisan make:seeder UsersTableSeeder

3. composer dump-autoload

4. php artisan db:seed

5. php artisan make:migration create_companies_table --create=companies

6. php artisan migrate

7. php artisan make:migration create_employees_table --create=employees

8. php artisan storage:link

9. php artisan make:controller CompaniesController --resource --model=Company

10. php artisan make:controller EmployeesController --resource --model=Employee

### log in as administrator
![log_admin](https://user-images.githubusercontent.com/28879502/61787975-e109d480-ae08-11e9-960e-41400ccc6ba3.png)

### Remove Registration feature
![remove_register_feature](https://user-images.githubusercontent.com/28879502/61787976-e109d480-ae08-11e9-8f23-e85e7e61b5e4.png)

### AdminLTE theme
![adminlte_theme](https://user-images.githubusercontent.com/28879502/61787967-dfd8a780-ae08-11e9-9efc-020cd0eb3b29.png)

### Company CRUD functionality
![Comp_crud](https://user-images.githubusercontent.com/28879502/61787968-dfd8a780-ae08-11e9-9e15-a0930048caac.png)

### Company Edit
![comp_edit](https://user-images.githubusercontent.com/28879502/61787969-dfd8a780-ae08-11e9-8a9e-3de891798996.png)

### Company Show
![comp_show](https://user-images.githubusercontent.com/28879502/61787970-e0713e00-ae08-11e9-845c-1f8345bdb425.png)

### Employee Crud
![emp_crud](https://user-images.githubusercontent.com/28879502/61787972-e0713e00-ae08-11e9-830e-a618a0001cae.png)

### Employee Add
![emp_add](https://user-images.githubusercontent.com/28879502/61787971-e0713e00-ae08-11e9-81f1-381e92160a7d.png)

### Employee Edit
![emp_edit](https://user-images.githubusercontent.com/28879502/61787974-e0713e00-ae08-11e9-9b9e-49c3224ec64a.png)

### Employee Delete

![emp_delete](https://user-images.githubusercontent.com/28879502/61787973-e0713e00-ae08-11e9-971e-659b3b8953cf.png)
