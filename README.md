###setup 
1. Creating Controller, Model And Migration
    ex. php artisan make:model Post -mcr (m = migration , c = controller, r = will make controller resource)
2. Migrating Database 
3. Resource Routing (define route)
4. create views
5. Validate & Submit Form
    - if use  Requests
      - warning unique:cruds (just correct table in db)
    - protect data in model (protected $fillable = ['title', 'description', 'is_active'];)
    - if use bootstrap pagination , change the boot method of the AppServiceProvider. (Paginator::useBootstrap();)  COZ  laravel 8 comes with tailwind css by default
6. View Single data (img eye)
7. Edit -> validate edit (follow by 5.)
8. Delete