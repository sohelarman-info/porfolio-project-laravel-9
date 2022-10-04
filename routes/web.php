<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    UserController,
    RoleController,
    PortHeaderController,
    IndexController,
    AdminController,
    PortPersonalController,
    PortAboutController,
    PortSkillContrller,
    PortVisionController,
    PortServiceController,
    Portfolio,
    CoundownController,
    EducationController,
    PricingController,
    TestimonialController,
    BlogController,
    ReadyController,
    SendMailController,
    ContactController,
    PaymentController,
};
use App\Models\Education;

//Non Auth Routes
Route::get('/',                 [IndexController::class, 'index'])->name('home');
Route::get('/portfolio',        [IndexController::class, 'PortfolioList'])->name('PortfolioList');
Route::get('/portfolio/{slug}', [IndexController::class, 'PortfolioViewPage'])->name('PortfolioViewPage');
Route::get('/blog/{slug}',      [IndexController::class, 'BlogView'])->name('BlogView');
Route::get('/headers',          [IndexController::class, 'headers'])->name('headers');
Route::get('/home',             [HomeController::class, 'index'])->name('frontend');
//Send Mail
Route::post('send-mail',                        [SendMailController::class, 'SendMail'])->name('SendMail');

Route::get('/login', function () {
    return view('auth/login');
});
//Laravel File Manager Route
/*
Must Be use this link in your .ENV for image showing
APP_URL=http://127.0.0.1:8000
*/
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

//Admin Dashboard
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('admin');
    //User Route and Controller
    Route::get('/user-list',                        [UserController::class, 'UserList'])->name('UserList');
    Route::post('/add-user',                        [UserController::class, 'AddUser'])->name('AddUser');
    Route::get('/edit-user/{id}',                   [UserController::class, 'UserEdit'])->name('UserEdit');
    Route::post('/update-user',                     [UserController::class, 'UpdateUser'])->name('UpdateUser');
    Route::get('/delete-user/{id}',                 [UserController::class, 'UserDeleted'])->name('UserDeleted');
    //Role Route and Controller
    Route::get('/role',                             [RoleController::class, 'Role'])->name('Role');
    Route::post('/add-role',                        [RoleController::class, 'AddRole'])->name('AddRole');
    Route::get('/delete-role/{id}',                 [RoleController::class, 'RoleDelete'])->name('RoleDelete');
    Route::get('/edit-role/{id}',                   [RoleController::class, 'RoleEdit'])->name('RoleEdit');
    Route::post('/update-role',                     [RoleController::class, 'UpdateRole'])->name('UpdateRole');
    //Permission
    Route::get('/permission',                       [RoleController::class, 'Permission'])->name('Permission');
    Route::get('/permission/{id}',                  [RoleController::class, 'PermissionEdit'])->name('PermissionEdit');
    Route::post('/permission-update',               [RoleController::class, 'UpdatePermission'])->name('UpdatePermission');
    Route::post('/add-permission',                  [RoleController::class, 'AddPermission'])->name('AddPermission');
    Route::get('/delete-permission/{id}',           [RoleController::class, 'DeletePermission'])->name('DeletePermission');
    Route::get('/role-permission',                  [RoleController::class, 'RolePermission'])->name('RolePermission');
    Route::post('/role-to-permission',              [RoleController::class, 'RoletoPermission'])->name('RoletoPermission');
    Route::get('/role-to-permission-edit/{id}',     [RoleController::class, 'RolePermissionEdit'])->name('RolePermissionEdit');
    Route::post('/role-to-permission-update',       [RoleController::class, 'UpdateRolePermissions'])->name('UpdateRolePermissions');
    //User Role
    Route::get('/user-role',                        [RoleController::class, 'UserRole'])->name('UserRole');
    Route::post('/user-add-to-role',                [RoleController::class, 'RoletoUser'])->name('RoletoUser');
    Route::get('/user-role-edit/{id}',              [RoleController::class, 'UserRoleEdit'])->name('UserRoleEdit');
    Route::post('/user-role-update',                [RoleController::class, 'UserRoleUpdate'])->name('UserRoleUpdate');
    //User Permissions
    Route::get('/user-permission',                  [RoleController::class, 'UserPermission'])->name('UserPermission');
    Route::post('/add-user-permission',             [RoleController::class, 'UserPermissionAdd'])->name('UserPermissionAdd');
    Route::get('/edit-user-permission/{id}',        [RoleController::class, 'UserPermissionEdit'])->name('UserPermissionEdit');
    Route::post('/update-user-permission',          [RoleController::class, 'UpdateUserPermissions'])->name('UpdateUserPermissions');
    Route::get('/clean-user-permission/{id}',       [RoleController::class, 'UserPermissionClean'])->name('UserPermissionClean');
});


//portfolio Website all content start here
Route::middleware(['auth'])->prefix('porfolio')->group(function () {
    //header Section
    Route::get('/header',                           [PortHeaderController::class, 'PortHeader'])->name('PortHeader');
    Route::post('/header-section',                  [PortHeaderController::class, 'PortHeaderImage'])->name('PortHeaderImage');
    Route::post('/header-image-update',             [PortHeaderController::class, 'PortHeaderImageUpdate'])->name('PortHeaderImageUpdate');
    Route::post('/header-nav-add',                  [PortHeaderController::class, 'PortHeaderNav'])->name('PortHeaderNav');
    Route::get('/header-nav-delete/{id}',           [PortHeaderController::class, 'PortHeaderNavDelete'])->name('PortHeaderNavDelete');
    Route::get('/header-nav-edit/{id}',             [PortHeaderController::class, 'PortHeaderNavEdit'])->name('PortHeaderNavEdit');
    Route::post('/header-nav-update',               [PortHeaderController::class, 'PortHeaderNavUpdate'])->name('PortHeaderNavUpdate');
    //Personal Area
    Route::get('/personal',                         [PortPersonalController::class, 'PersonalArea'])->name('PersonalArea');
    Route::post('/personal-add',                    [PortPersonalController::class, 'PersonalAreaAdd'])->name('PersonalAreaAdd');
    Route::post('/personal-update',                 [PortPersonalController::class, 'PersonalAreaUpdate'])->name('PersonalAreaUpdate');
    //Social Media
    Route::post('/social-add',                      [PortPersonalController::class, 'SocialAdd'])->name('SocialAdd');
    Route::get('/social-edit/{id}',                 [PortPersonalController::class, 'SocialEdit'])->name('SocialEdit');
    Route::get('/social-delete/{id}',               [PortPersonalController::class, 'SocialDelete'])->name('SocialDelete');
    Route::post('/social-update',                   [PortPersonalController::class, 'SocialUpdate'])->name('SocialUpdate');
    //About Section
    Route::get('/about',                            [PortAboutController::class, 'About'])->name('About');
    Route::post('/about-add',                       [PortAboutController::class, 'AboutAdd'])->name('AboutAdd');
    Route::post('/about-update',                    [PortAboutController::class, 'AboutUpdate'])->name('AboutUpdate');
    //Skill Section
    Route::get('skill',                             [PortSkillContrller::class, 'SkillSection'])->name('SkillSection');
    Route::post('skill-add',                        [PortSkillContrller::class, 'SkillAdd'])->name('SkillAdd');
    Route::post('skill-update',                     [PortSkillContrller::class, 'SkillUpdate'])->name('SkillUpdate');
    Route::get('skill-delete/{id}',                 [PortSkillContrller::class, 'SkillDelete'])->name('SkillDelete');
    //Why Me
    Route::post('why-me',                           [PortSkillContrller::class, 'WhyMe'])->name('WhyMe');
    Route::post('why-me-update',                    [PortSkillContrller::class, 'WhyMeUpdate'])->name('WhyMeUpdate');
    //My Vision
    Route::post('vision-add',                       [PortVisionController::class, 'VisionAdd'])->name('VisionAdd');
    Route::post('vision-update',                    [PortVisionController::class, 'VisionUpdate'])->name('VisionUpdate');
    //Service Section
    Route::get('service-section',                   [PortServiceController::class, 'ServiceSection'])->name('ServiceSection');
    Route::get('service-section-edit/{id}',         [PortServiceController::class, 'ServiceSectionEdit'])->name('ServiceSectionEdit');
    Route::post('service-section-add',              [PortServiceController::class, 'ServiceSectionAdd'])->name('ServiceSectionAdd');
    Route::post('service-section-update',           [PortServiceController::class, 'ServiceSectionUpdate'])->name('ServiceSectionUpdate');
    Route::post('service-add',                      [PortServiceController::class, 'ServiceAdd'])->name('ServiceAdd');
    Route::get('service-delete/{id}',               [PortServiceController::class, 'ServiceDelete'])->name('ServiceDelete');
    Route::get('service-edit/{id}',                 [PortServiceController::class, 'ServiceEdit'])->name('ServiceEdit');
    Route::post('service-update',                   [PortServiceController::class, 'ServiceUpdate'])->name('ServiceUpdate');
    //Portfolio Section
    Route::get('portfolio-list',                    [Portfolio::class, 'Portfolio'])->name('Portfolio');
    Route::post('portfolio-section-add',            [Portfolio::class, 'PortfolioSectionAdd'])->name('PortfolioSectionAdd');
    Route::get('port-section-edit/{id}',            [Portfolio::class, 'PortfolioSectionEdit'])->name('PortfolioSectionEdit');
    Route::post('portfolio-section-update',         [Portfolio::class, 'PortfolioSectionUpdate'])->name('PortfolioSectionUpdate');
    Route::post('portfolio-category-add',           [Portfolio::class, 'PortCatAdd'])->name('PortCatAdd');
    Route::get('port-category-delete/{id}',         [Portfolio::class, 'PortCatDelete'])->name('PortCatDelete');
    Route::get('port-category-edit/{id}',           [Portfolio::class, 'PortCatEdit'])->name('PortCatEdit');
    Route::post('port-category-update',             [Portfolio::class, 'PortCategoryUpdate'])->name('PortCategoryUpdate');
    Route::get('project/{slug}',                    [Portfolio::class, 'InCategory'])->name('InCategory');
    Route::get('portfolio-add',                     [Portfolio::class, 'PortfolioAdd'])->name('PortfolioAdd');
    Route::post('portfolio-project-add',            [Portfolio::class, 'PortfolioProjectAdd'])->name('PortfolioProjectAdd');
    Route::get('portfolio-project-delete/{id}',     [Portfolio::class, 'PortfolioProjectDelete'])->name('PortfolioProjectDelete');
    Route::get('portfolio-project-view/{slug}',     [Portfolio::class, 'PortfolioProjectView'])->name('PortfolioProjectView');
    Route::get('portfolio-project-edit/{slug}',     [Portfolio::class, 'PortfolioProjectEdit'])->name('PortfolioProjectEdit');
    Route::get('multiple-image-delete/{id}',        [Portfolio::class, 'MultipleImageDelete'])->name('MultipleImageDelete');
    Route::post('portfolio-project-update/',        [Portfolio::class, 'PortfolioProjectUpdate'])->name('PortfolioProjectUpdate');
    //Coundown
    Route::get('coundown',                          [CoundownController::class, 'Coundown'])->name('Coundown');
    Route::post('coundown/add',                     [CoundownController::class, 'CoundownAdd'])->name('CoundownAdd');
    Route::get('coundown/edit/{id}',                [CoundownController::class, 'CoundownEdit'])->name('CoundownEdit');
    Route::post('coundown/update',                  [CoundownController::class, 'CoundownUpdate'])->name('CoundownUpdate');
    Route::get('coundown/delete/{id}',              [CoundownController::class, 'CoundownDelete'])->name('CoundownDelete');
    //Education
    Route::get('education',                         [EducationController::class, 'Education'])->name('Education');
    Route::post('education-section-add',            [EducationController::class, 'EducationSectionAdd'])->name('EducationSectionAdd');
    Route::get('education-section-edit/{id}',       [EducationController::class, 'EducationSectionEdit'])->name('EducationSectionEdit');
    Route::post('education-section-update',         [EducationController::class, 'EducationSectionUpdate'])->name('EducationSectionUpdate');
    Route::post('study-add',                        [EducationController::class, 'StudyAdd'])->name('StudyAdd');
    Route::get('study-delete/{id}',                 [EducationController::class, 'StudyDelete'])->name('StudyDelete');
    Route::get('study-edit/{id}',                   [EducationController::class, 'StudyEdit'])->name('StudyEdit');
    Route::post('study-update',                     [EducationController::class, 'StudyUpdate'])->name('StudyUpdate');
    //Pricing
    Route::post('pricing-sectioin-add',             [PricingController::class, 'PricingSectionAdd'])->name('PricingSectionAdd');
    Route::get('pricing-sectioin-edit/{id}',        [PricingController::class, 'PricingSectionEdit'])->name('PricingSectionEdit');
    Route::post('pricing-sectioin-update',          [PricingController::class, 'PricingSectionUpdate'])->name('PricingSectionUpdate');
    Route::post('pricing-add',                      [PricingController::class, 'PricingAdd'])->name('PricingAdd');
    Route::get('pricing-delete/{id}',               [PricingController::class, 'priceDelete'])->name('priceDelete');
    Route::get('pricing-edit/{id}',                 [PricingController::class, 'PriceEdit'])->name('PriceEdit');
    Route::post('pricing-update',                   [PricingController::class, 'PricingUpdate'])->name('PricingUpdate');
    //Testimonials
    Route::get('testimonials',                      [TestimonialController::class, 'Testimonials'])->name('Testimonials');
    Route::get('testimonial-add',                   [TestimonialController::class, 'TestimonialAdd'])->name('TestimonialAdd');
    Route::post('testimonial-store',                [TestimonialController::class, 'Testimonialstore'])->name('Testimonialstore');
    Route::get('testimonial-delete/{id}',           [TestimonialController::class, 'TestimonialDelete'])->name('TestimonialDelete');
    Route::get('testimonial-edit/{id}',             [TestimonialController::class, 'TestimonialEdit'])->name('TestimonialEdit');
    Route::post('testimonial-update',               [TestimonialController::class, 'TestimonialUpdate'])->name('TestimonialUpdate');
    //Blog Section
    Route::get('blog-section',                      [BlogController::class, 'BlogSection'])->name('BlogSection');
    Route::post('blog-section',                     [BlogController::class, 'BlogSectionAdd'])->name('BlogSectionAdd');
    Route::get('blog-section-edit/{id}',            [BlogController::class, 'BlogSectionEdit'])->name('BlogSectionEdit');
    Route::post('blog-section-update',              [BlogController::class, 'BlogSectionUpdate'])->name('BlogSectionUpdate');
    //Blog Category
    Route::post('blog-category-add',                [BlogController::class, 'BlogCategoryAdd'])->name('BlogCategoryAdd');
    Route::get('blog-category-delete/{id}',         [BlogController::class, 'BlogCategoryDelete'])->name('BlogCategoryDelete');
    Route::get('blog-category-edit/{id}',           [BlogController::class, 'BlogCategoryEdit'])->name('BlogCategoryEdit');
    Route::post('blog-category-update',             [BlogController::class, 'BlogCategoryUpdate'])->name('BlogCategoryUpdate');
    Route::get('category-wise/{slug}',              [BlogController::class, 'BlogInCategory'])->name('BlogInCategory');
    //Blog
    Route::get('blog-soft-delete/{id}',             [BlogController::class, 'SoftDelete'])->name('SoftDelete');
    Route::get('blog-trush',                        [BlogController::class, 'TrushFolder'])->name('TrushFolder');
    Route::get('blog-restore/{id}',                 [BlogController::class, 'BlogRestore'])->name('BlogRestore');
    Route::get('blog-delete/{id}',                  [BlogController::class, 'BlogDestroy'])->name('BlogDestroy');
    Route::resource('blog',                          BlogController::class);
    //Ready Section
    Route::get('ready-section',                     [ReadyController::class, 'Ready'])->name('Ready');
    Route::post('ready-add',                        [ReadyController::class, 'ReadyAdd'])->name('ReadyAdd');
    Route::post('ready-update',                     [ReadyController::class, 'ReadyUpdate'])->name('ReadyUpdate');
    //Send Mail Section
    Route::get('send-mail-section',                 [SendMailController::class, 'SendMailSection'])->name('SendMailSection');
    Route::get('send-mail-view/{id}',               [SendMailController::class, 'SendMailview'])->name('SendMailview');
    Route::get('send-mail-delete/{id}',             [SendMailController::class, 'SendMailDelete'])->name('SendMailDelete');
    //Contact Section
    Route::get('contact-section',                   [ContactController::class, 'ContactSection'])->name('ContactSection');
    Route::post('contact-section-add',              [ContactController::class, 'ContactSectionAdd'])->name('ContactSectionAdd');
    Route::post('contact-add',                      [ContactController::class, 'ContactAdd'])->name('ContactAdd');
    Route::post('contact-update',                   [ContactController::class, 'ContactUpdate'])->name('ContactUpdate');
    Route::get('contact-edit/{id}',                 [ContactController::class, 'ContactSectionEdit'])->name('ContactSectionEdit');
    Route::post('contact-section-update',           [ContactController::class, 'ContactSectionUpdate'])->name('ContactSectionUpdate');
    //Payment Method
    Route::post('payment-method-add',               [PaymentController::class, 'PaymentMethodAdd'])->name('PaymentMethodAdd');
    Route::get('payment-method-delete/{id}',        [PaymentController::class, 'PaymentMethodDelete'])->name('PaymentMethodDelete');
    Route::get('payment-method-edit/{id}',          [PaymentController::class, 'PaymentMethodEdit'])->name('PaymentMethodEdit');
    Route::post('payment-method-update',            [PaymentController::class, 'PaymentMethodUpdate'])->name('PaymentMethodUpdate');

});


