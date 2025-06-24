<?php

use App\Http\Controllers\ClinetFollowUp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MakePageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\ClientDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceControl;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeControl;
use App\Http\Controllers\GetTouchUsController;
use App\Http\Controllers\HeaderFooterClass;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Page;
use App\Http\Controllers\PageControl;
use App\Http\Controllers\PaymentTermsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectControl;
use App\Http\Controllers\ProjectMessageController;
use App\Http\Controllers\RecentProjectController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeSheetControl;
use App\Http\Middleware\AdminCheck;
use App\Models\Menu;
use App\Models\Service;
use PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooter;

Route::get('/', function () {
   return redirect()->route('admin.loginForm');
    die;
    $category = Menu::get();
    $service = Service::get();
    // return view('front-end.index',compact('category','service'));
    return view('cms.index');
})->name('cms.home');
Route::get('/test', function () {
    return view('test');
});
Route::get('/client-details', [ClientDetailController::class, 'index'])->name('client.index');
Route::post('/client-save', [ClientDetailController::class, 'store'])->name('clients.submit');
Route::get('login', function () {
    return redirect()->route('admin.loginForm');
})->name('login');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('back-end.login');
    })->name('admin.loginForm');
    Route::post('/login', [DashboardController::class, 'login'])->name('admin.login');
    Route::get('/createAdmin', [DashboardController::class, 'createAdmin']);

    Route::middleware('auth:admin')->group(function () {
        Route::middleware('checkAdmin')->group(function () {
            Route::resource('/employee', EmployeeControl::class);
            Route::post('/add-crediencial', [EmployeeControl::class, 'addCredit'])->name('add.crediencial');
            Route::post('/update-crediencial', [EmployeeControl::class, 'updateCredit'])->name('update.crediencial');
            Route::resource('designation', DesignationController::class);
            Route::post('designation-upgrade/{id}', [DesignationController::class,'upgrade'])->name('designation.upgrade');
            Route::get('/attendence/{id}', [AttendanceControl::class, 'index'])->name('attendence.view');
            Route::resource('project', ProjectControl::class);
            Route::get('/add-project', [ProjectControl::class, 'addProject'])->name('add.project');
            Route::post('/store-project', [ProjectControl::class, 'store'])->name('project.store');
            Route::post('/project-upgrade', [ProjectControl::class,'upgrade'])->name('project.upgrade');

            Route::get('/modules/{module}/tasks', [TaskController::class, 'index'])->name('modules.tasks.index');
            Route::post('/modules/{module}/tasks', [TaskController::class, 'store'])->name('modules.tasks.store');
            Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('modules.tasks.update');
            Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('modules.tasks.destroy');       
            Route::get('/{project}/tasks', [TaskController::class, 'manage'])->name('tasks.manage');
            Route::get('/modules/{module}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('modules.tasks.edit');


            Route::delete('/project-message/{id}', [ProjectMessageController::class, 'destroy'])->name('project-message.destroy');
            Route::resource('admins', AdminController::class);
            Route::resource('/service', ServiceController::class);
            Route::post('/assign-modules/', [ProjectMessageController::class, 'modulesAssign'])->name('assign.modules');
            Route::get('/assign-project/', [ProjectMessageController::class, 'projectAssign'])->name('project.assign');
        });
            Route::post('/employee/{employeeId}', [EmployeeControl::class, 'update']);
            Route::get('/employee-leave', [EmployeeControl::class, 'EmployeeLeave'])->name('employee.leave');
            Route::get('/employee-apply', [EmployeeControl::class, 'EmployeeLeaveApply'])->name('employee.apply');
            Route::get('/show-employee/{id}', [EmployeeControl::class, 'show2'])->name('employee.show2');
            Route::post('/project-message/store', [ProjectMessageController::class, 'store'])->name('project-message.store');
            Route::get('/project-message/{id}', [ProjectMessageController::class, 'show'])->name('project-message.show');
            Route::get('/projects/{project}/assigned-employees', [ProjectMessageController::class, 'getAssignedEmployees']);
            Route::post('/assign-employees/{id}', [ProjectMessageController::class, 'assignEmployees'])->name('assign.employees');
            Route::put('/project-message/{id}', [ProjectMessageController::class, 'update'])->name('project-message.update');
            Route::get('/projects', [ProjectControl::class, 'employeeProject'])->name('employee.projects');
                Route::post('/start-project', [ProjectControl::class, 'startProject'])->name('start.project');
                Route::post('/stop-project', [ProjectControl::class, 'stopProject'])->name('stop.project');
                Route::post('/start-module', [ProjectControl::class, 'startModule'])->name('start.module');
                Route::post('/stop-module', [ProjectControl::class, 'stopModule'])->name('stop.module');
                Route::post('/start-task', [TaskController::class, 'startTask'])->name('start.task');
                Route::post('/stop-task', [TaskController::class, 'stopTask'])->name('stop.task');
                Route::post('/pause-task', [TaskController::class, 'pauseTask'])->name('pause.task');
Route::post('/resume-task', [TaskController::class, 'resumeTask'])->name('resume.task');
            


            Route::get('/employee-profile/', [EmployeeControl::class, 'profile'])->name('employee.profile');
            Route::post('/leave-apply/', [AttendanceControl::class, 'applyLeave'])->name('apply.leave');
            Route::get('/employee-time-sheet/', [TimeSheetControl::class, 'index'])->name('employee.timesheet');
            Route::get('/employee-time-sheet/create', [TimeSheetControl::class, 'create'])->name('employee.timesheet.create');
            Route::post('/employee-time-sheet/store', [TimeSheetControl::class, 'store'])->name('employee.timesheet.store');
        
        Route::get('/headerFooter', [HeaderFooterClass::class, 'index'])->name('header.footer.dashboard');
        Route::post('/logo-upload', [HeaderFooterClass::class, 'uploadLogo'])->name('logo.upload');
        Route::post('/link-update', [HeaderFooterClass::class, 'updateLink'])->name('link.update');
        Route::post('/menu/{menu}', [HeaderFooterClass::class, 'updatemenu'])->name('menu.update');
        Route::post('/admin/menu', [HeaderFooterClass::class, 'storemenu'])->name('menuandlink.store');
        Route::delete('/admin/menu/{id}', [HeaderFooterClass::class, 'destroy'])->name('menuandlink.destroy');
        Route::post('/link/menu', [HeaderFooterClass::class, 'linkandmenu'])->name('linkandmenu.update');
        Route::post('/footer/menu', [HeaderFooterClass::class, 'footermenu'])->name('footermenu.update');

        Route::get('/home-sections', [HomePageController::class, 'homesections'])->name('home.sections');
        Route::post('/sections', [HomePageController::class, 'store'])->name('sections.store');
        Route::put('/sections/{id}', [HomePageController::class, 'update'])->name('sections.update');
        Route::delete('/sections/{id}', [HomePageController::class, 'destroy'])->name('sections.destroy');
        Route::post('/sortorder-update', [HomePageController::class, 'sortorderupdate'])->name('sortorder.update');

        Route::resource('pages', Page::class);
        Route::get('/page-section/{slug}', [PageControl::class, 'index'])->name('pagesection.index');
        Route::post('/page-dupliacate', [PageControl::class, 'duplicate'])->name('page.duplicate');

        Route::get('/section-choose/{id}', [HomePageController::class, 'sectionchoose'])->name('section.choose');
        Route::post('/section/update-status', [HomePageController::class, 'updateStatus'])->name('section.updateStatus');
        Route::post('/sortorder-update', [HomePageController::class, 'sortorderupdate'])->name('sortorder.update');
        Route::delete('/section-delete/{id}', [HomePageController::class, 'destroy'])->name('section.delete');
        Route::post('/price/store', [HomePageController::class, 'store2'])->name('price.store');
        Route::put('/price/{id}', [HomePageController::class, 'update2'])->name('price.update2');
        Route::get('/get-touch/{parent_id}', [GetTouchUsController::class, 'index'])->name('getTouchUs.index');
        Route::get('/get-touch/{id}', [GetTouchUsController::class, 'show'])->name('getTouchUs.show');
        Route::put('/get-touch/{id}', [GetTouchUsController::class, 'update'])->name('getTouchUs.update');
        Route::delete('/get-touch/{id}', [GetTouchUsController::class, 'destroy'])->name('getTouchUs.destroy');
        Route::resource('client-reviews', ClientReviewController::class);
        Route::get('/client-review/{parent_id}', [ClientReviewController::class, 'index'])->name('client.reviews.index');
        Route::resource('portfolios', PortfolioController::class);
        Route::get('/portfolios/{id}', [PortfolioController::class, 'edit'])->name('portfolios.edit');
        Route::post('/logos/update', [LogoController::class, 'update'])->name('logos.update');
        Route::post('/logos', [LogoController::class, 'store'])->name('logos.store');
        Route::delete('/logos/{id}', [LogoController::class, 'destroy'])->name('logos.destroy');
        Route::get('recent-projects/{parent_id}', [RecentProjectController::class, 'index'])->name('recent.projects.index');
        Route::post('recent-projects/content-update', [RecentProjectController::class, 'contentUpdate'])->name('project.update.route');
        Route::post('recent-projects', [RecentProjectController::class, 'store'])->name('recent-projects.store');
        Route::get('recentprojects/{id}', [RecentProjectController::class, 'show'])->name('recent-projects.show');
        Route::post('recent-projects/{id}', [RecentProjectController::class, 'update'])->name('recent-projects.update');
        Route::delete('recent-projects/{id}', [RecentProjectController::class, 'destroy']);
        Route::post('/payment-terms/{id}', [PaymentTermsController::class, 'update'])->name('payment-terms.update');
        Route::post('/seo-sections/{id}', [SEOController::class, 'update'])->name('seo-sections.update');


        Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/dashboard', [DashboardController::class, 'store2'])->name('projects.control.store2');
        Route::delete('/dashboard/control/{id}', [DashboardController::class, 'destroy'])->name('projects.control.destroy');
        Route::post('/projects/control/{id}', [DashboardController::class, 'update']);
        Route::resource('/menu', MenuController::class);
        Route::get('/submenu', [SubMenuController::class, 'index'])->name('submenu');
        Route::post('/sub-menu', [SubMenuController::class, 'store'])->name('sub-menu.store');
        Route::put('/sub-menu/{id}', [SubMenuController::class, 'update'])->name('sub-menu.update');
        Route::delete('/sub-menu/{id}', [SubMenuController::class, 'destroy'])->name('sub-menu.destroy');
        Route::get('/page-layout', [MakePageController::class, 'index'])->name('page.index');
        Route::get('/get-submenus/{id}', [MakePageController::class, 'subMenu']);
        Route::post('/save-page', [MakePageController::class, 'savePage'])->name('save.page');
        Route::post('/save-page2', [MakePageController::class, 'savePage2'])->name('hero.update');
        Route::get('/inquiries', [HomeController::class, 'index'])->name('home.index');
        Route::post('/home-content', [HomeController::class, 'inputContent'])->name('home.input');
        Route::post('/home-save', [HomeController::class, 'store'])->name('home.submit');
        Route::post('/enquiry-edit/{id}', [ClinetFollowUp::class, 'update'])->name('update.inquiries');
        Route::delete('/enquiry-delete/{id}', [ClinetFollowUp::class, 'destroy'])->name('delete.inquiries');

        Route::get('/modules', [ModuleController::class, 'index']);
        Route::get('/modules/{id}', [ModuleController::class, 'getModules']);
        Route::post('/modules', [ModuleController::class, 'store']);
        Route::put('/modules/{id}', [ModuleController::class, 'update']);
        Route::delete('/modules/{id}', [ModuleController::class, 'destroy']);

        Route::get('/clients-following', [HomeController::class, 'followingClients'])->name('clients.following');
        Route::get('/clients-completed', [HomeController::class, 'completedClients'])->name('clients.completed');
        Route::get('/clients-rejected', [HomeController::class, 'rejectedClients'])->name('clients.rejected');
        Route::get('/clients-pending', [HomeController::class, 'pendingClients'])->name('home.clients');
        Route::get('/followup/{id}', [ClinetFollowUp::class, 'client'])->name('client.follow');
        Route::post('/followups-status', [ClinetFollowUp::class, 'sentProposel'])->name('followups.sentProposel');
        Route::get('/followups-list', [HomeController::class, 'listProposel'])->name('clients.proposal');
        Route::post('/followups-update', [HomeController::class, 'proposalUpadate'])->name('client.proposalUpadate');
        Route::post('/client-status', [ClinetFollowUp::class, 'clientStatus'])->name('client.updateStatus');
        Route::post('/filter-inquiries', [ClinetFollowUp::class, 'filterInquiries'])->name('inquiries.filter');
       
        Route::post('/followups', [FollowUpController::class, 'store'])->name('followups.store');
        Route::get('/clients-list', [ClientDetailController::class, 'clientsList'])->name('clients.list');

        Route::post('/import-contacts', [ExcelImportController::class, 'importContacts'])->name('import.contacts');
        Route::get('/download-sample', [ExcelImportController::class, 'downloadSample'])->name('download.sample');

        Route::post('/import-clientss', [ExcelImportController::class, 'importClients'])->name('import.clients');
        Route::get('/download-sample-clients', [ExcelImportController::class, 'downloadClientsSample'])->name('download.clients');

        Route::post('/update/{id}', [ClientDetailController::class, 'update'])->name('update.client');
        Route::delete('/delete/{id}', [ClientDetailController::class, 'destroy'])->name('delete.client');
        Route::post('client-filter', [ClientDetailController::class, 'filterClients'])->name('filter.clients');

        Route::get('/segments', [SegmentController::class, 'index'])->name('segment.list');
        Route::get('/segments/{segment}', [SegmentController::class, 'show'])->name('segment.show');
        Route::post('/segments', [SegmentController::class, 'store'])->name('segment.store');
        Route::put('/segments/{segment}', [SegmentController::class, 'update'])->name('segment.update');
        Route::delete('/segments/{segment}', [SegmentController::class, 'destroy'])->name('segment.destroy');
   
    });
});
// Route::get('/{slug}', [HomePageController::class, 'slug'])->name('home.slug');

