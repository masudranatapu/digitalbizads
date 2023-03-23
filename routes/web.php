<?php

use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebToolsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\StateController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\User\VariantController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\User\EditCardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Payment\OfflineController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\AdditionalController;
use App\Http\Controllers\Payment\RazorpayController;
use App\Http\Controllers\User\ShippingAreaController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\User\ProductCategoryController;
use App\Http\Controllers\User\AccountController as userAccount;
use App\Http\Controllers\User\DashboardController as userDashboard;
use App\Http\Controllers\User\TransactionsController as userTransactions;
use App\Http\Controllers\User\SettingsController as UserSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    return 'DONE';
});

// Installer Middleware
Route::group(['middleware' => 'Installer'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home-locale');
    Auth::routes();
    // Pages
    Route::get('faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('about-us', [HomeController::class, 'about'])->name('about');
    Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');
    Route::get('support', [HomeController::class, 'support'])->name('support');
    Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
    Route::get('terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms.and.conditions');
    Route::get('refund-policy', [HomeController::class, 'refundPolicy'])->name('refund.policy');
    Route::post('card/subscriber', [HomeController::class, 'postSubscriber'])->name('card.subscriber');
    Route::post('post-register', [AuthController::class, 'postRegister'])->name('post-register');
    // Web Tools
    // HTML
    Route::get('html-beautifier', [WebToolsController::class, 'htmlBeautifier'])->name('web.html.beautifier');
    Route::get('html-minifier', [WebToolsController::class, 'htmlMinifier'])->name('web.html.minifier');
    // CSS
    Route::get('css-beautifier', [WebToolsController::class, 'cssBeautifier'])->name('web.css.beautifier');
    Route::get('css-minifier', [WebToolsController::class, 'cssMinifier'])->name('web.css.minifier');
    Route::post('css-minifier', [WebToolsController::class, 'resultCssMinifier'])->name('web.result.css.minifier');
    // JS
    Route::get('js-beautifier', [WebToolsController::class, 'jsBeautifier'])->name('web.js.beautifier');
    Route::get('js-minifier', [WebToolsController::class, 'jsMinifier'])->name('web.js.minifier');
    Route::post('js-minifier', [WebToolsController::class, 'resultjsMinifier'])->name('web.result.js.minifier');
    // Random Password Generator
    Route::get('random-password-generator', [WebToolsController::class, 'randomPasswordGenerator'])->name('web.random.password.generator');
    Route::post('random-password-generator', [WebToolsController::class, 'resultRandomPasswordGenerator'])->name('web.result.random.password.generator');
    // Bcrypt Password Generator
    Route::get('bcrypt-password-generator', [WebToolsController::class, 'bcryptPasswordGenerator'])->name('web.bcrypt.password.generator');
    Route::post('bcrypt-password-generator', [WebToolsController::class, 'resultBcryptPasswordGenerator'])->name('web.result.bcrypt.password.generator');
    // MD5 Password Generator
    Route::get('md5-password-generator', [WebToolsController::class, 'md5PasswordGenerator'])->name('web.md5.password.generator');
    Route::post('md5-password-generator', [WebToolsController::class, 'resultMd5PasswordGenerator'])->name('web.result.md5.password.generator');
    // Random Word Generator
    Route::get('random-word-generator', [WebToolsController::class, 'randomWordGenerator'])->name('web.random.word.generator');
    Route::post('random-word-generator', [WebToolsController::class, 'resultRandomWordGenerator'])->name('web.result.random.word.generator');
    // Text counter
    Route::get('text-counter', [WebToolsController::class, 'textCounter'])->name('web.text.counter');
    // Lorem Generator
    Route::get('lorem-generator', [WebToolsController::class, 'loremGenerator'])->name('web.lorem.generator');
    // Emojies
    Route::get('emojies', [WebToolsController::class, 'emojies'])->name('web.emojies');
    // DNS Lookup
    Route::get('dns-lookup', [WebToolsController::class, 'dnsLookup'])->name('web.dns.lookup');
    Route::post('dns-lookup', [WebToolsController::class, 'resultDnsLookup'])->name('web.result.dns.lookup');
    // IP Lookup
    Route::get('ip-lookup', [WebToolsController::class, 'ipLookup'])->name('web.ip.lookup');
    Route::post('ip-lookup', [WebToolsController::class, 'resultIpLookup'])->name('web.result.ip.lookup');
    // Whois Lookup
    Route::get('whois-lookup', [WebToolsController::class, 'whoisLookup'])->name('web.whois.lookup');
    Route::post('whois-lookup', [WebToolsController::class, 'resultWhoisLookup'])->name('web.result.whois.lookup');
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Themes
        Route::get('themes', [ThemeController::class, 'themes'])->name('themes');
        // Plans
        Route::get('plans', [PlanController::class, 'plans'])->name('plans');
        Route::get('add-plan', [PlanController::class, 'addPlan'])->name('add.plan');
        Route::post('save-plan', [PlanController::class, 'savePlan'])->name('save.plan');
        Route::get('edit-plan/{id}', [PlanController::class, 'editPlan'])->name('edit.plan');
        Route::post('update-plan', [PlanController::class, 'updatePlan'])->name('update.plan');
        Route::get('delete-plan', [PlanController::class, 'deletePlan'])->name('delete.plan');
        // Users
        Route::get('users', [UserController::class, 'users'])->name('users');
        Route::get('edit-user/{id}', [UserController::class, 'editUser'])->name('edit.user');
        Route::post('update-user', [UserController::class, 'updateUser'])->name('update.user');
        Route::get('view-user/{id}', [UserController::class, 'viewUser'])->name('view.user');
        Route::get('change-user-plan/{id}', [UserController::class, 'ChangeUserPlan'])->name('change.user.plan');
        Route::post('update-user-plan', [UserController::class, 'UpdateUserPlan'])->name('update.user.plan');
        Route::get('update-status', [UserController::class, 'updateStatus'])->name('update.status');
        Route::get('delete-user', [UserController::class, 'deleteUser'])->name('delete.user');
        Route::get('login-as/{id}', [UserController::class, 'authAs'])->name('login-as.user');
        // Payment Gateways
        Route::get('payment-methods', [PaymentMethodController::class, 'paymentMethods'])->name('payment.methods');
        Route::get('add-payment-method', [PaymentMethodController::class, 'addPaymentMethod'])->name('add.payment.method');
        Route::post('save-payment-method', [PaymentMethodController::class, 'savePaymentMethod'])->name('save.payment.method');
        Route::get('edit-payment-method/{id}', [PaymentMethodController::class, 'editPaymentMethod'])->name('edit.payment.method');
        Route::post('update-payment-method', [PaymentMethodController::class, 'updatePaymentMethod'])->name('update.payment.method');
        Route::get('delete-payment-method', [PaymentMethodController::class, 'deletePaymentMethod'])->name('delete.payment.method');
        // Transactions
        Route::get('transactions', [TransactionsController::class, 'indexTransactions'])->name('transactions');
        Route::get('transaction-status/{id}/{status}', [TransactionsController::class, 'transactionStatus'])->name('trans.status');
        Route::get('offline-transactions', [TransactionsController::class, 'offlineTransactions'])->name('offline.transactions');
        Route::get('offline-transaction-status/{id}/{status}', [TransactionsController::class, 'offlineTransactionStatus'])->name('offline.trans.status');
        Route::get('view-invoice/{id}', [TransactionsController::class, 'viewInvoice'])->name('view.invoice');
        // Account Setting
        Route::get('account', [AccountController::class, 'account'])->name('account');
        Route::get('edit-account', [AccountController::class, 'editAccount'])->name('edit.account');
        Route::post('update-account', [AccountController::class, 'updateAccount'])->name('update.account');
        Route::get('change-password', [AccountController::class, 'changePassword'])->name('change.password');
        Route::post('update-password', [AccountController::class, 'updatePassword'])->name('update.password');
        // Pages
        Route::get('pages', [SettingsController::class, 'pages'])->name('pages');
        Route::get('page/{id}', [SettingsController::class, 'editPage'])->name('edit.page');
        Route::post('save-page/{id}', [SettingsController::class, 'savePage'])->name('save.page');
        // Settings
        Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
        Route::post('change-general-settings', [SettingsController::class, "changeGeneralSettings"])->name('change.general.settings');
        Route::post('change-website-settings', [SettingsController::class, "changeWebsiteSettings"])->name('change.website.settings');
        Route::post('change-payments-settings', [SettingsController::class, "changePaymentsSettings"])->name('change.payments.settings');
        Route::post('change-google-settings', [SettingsController::class, "changeGoogleSettings"])->name('change.google.settings');
        Route::post('change-email-settings', [SettingsController::class, "changeEmailSettings"])->name('change.email.settings');
        // tax setting
        Route::get('tax-setting', [SettingsController::class, 'taxSetting'])->name('tax.setting');
        Route::post('update-tex-setting', [SettingsController::class, 'updateTaxSetting'])->name('update.tax.setting');
        Route::post('update-email-setting', [SettingsController::class, 'updateEmailSetting'])->name('update.email.setting');
        Route::get('test-email', [SettingsController::class, 'testEmail'])->name('test.email');
        // Clear cache
        Route::get('clear', [SettingsController::class, 'clear'])->name('clear');
        // Generating a sitemap
        Route::get('generate-sitemap', [SettingsController::class, 'generateSiteMap'])->name('generate.sitemap');
        // Check update
        Route::get('check', [UpdateController::class, 'check'])->name('check');
        Route::post('check-update', [UpdateController::class, 'checkUpdate'])->name('check.update');
        Route::post('update-code', [UpdateController::class, 'updateCode'])->name('update.code');
    });
    // user
    Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
        Route::get('plans', [CardController::class, 'plans'])->name('plans')->withoutMiddleware(['userPlan']);
        Route::middleware(['userPlan'])->group(function () {
            Route::get('dashboard', [userDashboard::class, 'index'])->name('dashboard');
            // Business Cards
            Route::get('cards', [CardController::class, 'cards'])->name('cards');
            Route::get('card-status/{id}', [CardController::class, 'cardStatus'])->name('card.status');
            Route::get('card-delete/{card}', [CardController::class, 'cardDelete'])->name('card.delete');
            Route::get('card-store/{id}/{status}', [CardController::class, 'cardStoreStatus'])->name('card.storestatus');
            Route::get('card-subscriber/{card}', [CardController::class, 'subscriber'])->name('card.subscriber');
            Route::post('send-mail-subscriber', [CardController::class, 'sendMail'])->name('card.subscriber.send.mail');
            Route::get('subscriber-export/{card}', [CardController::class, 'subscriberExport'])->name('card.subscriber.export');
            // Business Store
            Route::get('stores', [CardController::class, 'getStores'])->name('stores');
            Route::get('whatsapp-stores', 'CardController@storeCards')->name('whatsapp-stores');
            // Business Plans
            // Media
            Route::get('media', [MediaController::class, 'media'])->name('media');
            Route::get('add-media', [MediaController::class, 'addMedia'])->name('add.media');
            Route::post('upload-media', [MediaController::class, 'uploadMedia'])->name('upload.media');
            Route::get('delete-media/{id}', [MediaController::class, 'deleteMedia'])->name('media.delete');

            // Upload media images
            Route::post('multiple', [MediaController::class, 'multipleImages'])->name('multiple');
            Route::post('card/store', [CardController::class, 'postStore'])->name('card.store');
            Route::post('card/update/{id}', [CardController::class, 'postUpdate'])->name('card.update');
            Route::get('card/delete/{id}', [CardController::class, 'getDelete'])->name('card.delete2');
            Route::post('card/upload_image', ['as' => 'card.upload_image', 'uses' => 'CardController@uploadImage']);
            Route::post('card/upload_logo', ['as' => 'card.upload_logo', 'uses' => 'CardController@uploadLogo']);
            Route::get('create-card', [CardController::class, 'CreateCard'])->name('create.card');
            Route::get('edit-card/{id}', [CardController::class, 'editCard'])->name('edit.card');
            Route::get('card/gallery-delete/{id}', [CardController::class, 'getDeleteGallery'])->name('card.gallery-delete');

            // v card
            if (env('APP_TYPE') == 'VCARD' || env('APP_TYPE') == 'BOTH') {
                // Create Business Card
                // Route::get('create-card', [CardController::class, 'CreateCard'])->name('create.card');
                Route::post('save-business-card', [CardController::class, 'saveBusinessCard'])->name('save.business.card');
                Route::get('social-links/{id}', [CardController::class, 'socialLinks'])->name('social.links');
                Route::post('save-social-links/{id}', [CardController::class, 'saveSocialLinks'])->name('save.social.links');
                Route::get('payment-links/{id}', [CardController::class, 'paymentLinks'])->name('payment.links');
                Route::post('save-payment-links/{id}', [CardController::class, 'savePaymentLinks'])->name('save.payment.links');
                Route::get('services/{id}', [CardController::class, 'services'])->name('services');
                Route::post('save-services/{id}', [CardController::class, 'saveServices'])->name('save.services');
                Route::get('galleries/{id}', [CardController::class, 'galleries'])->name('galleries');
                Route::post('save-galleries/{id}', [CardController::class, 'saveGalleries'])->name('save.galleries');
                Route::get('business-hours/{id}', [CardController::class, 'businessHours'])->name('business.hours');
                Route::post('save-business-hours/{id}', [CardController::class, 'saveBusinessHours'])->name('save.business.hours');
            }
            // Check link
            Route::post('check-link', [CardController::class, 'checkLink'])->name('check.link');
            // Edit Business Card
            // Route::get('edit-card/{id}', [EditCardController::class, 'editCard'])->name('edit.card');
            Route::post('update-business-card/{id}', [EditCardController::class, 'updateBusinessCard'])->name('update.business.card');
            Route::get('edit-social-links/{id}', [EditCardController::class, 'socialLinks'])->name('edit.social.links');
            Route::post('update-social-links/{id}', [EditCardController::class, 'updateSocialLinks'])->name('update.social.links');
            Route::get('edit-payment-links/{id}', [EditCardController::class, 'paymentLinks'])->name('edit.payment.links');
            Route::post('update-payment-links/{id}', [EditCardController::class, 'updatePaymentLinks'])->name('update.payment.links');
            Route::get('edit-services/{id}', [EditCardController::class, 'services'])->name('edit.services');
            Route::post('update-services/{id}', [EditCardController::class, 'updateServices'])->name('update.services');
            Route::get('edit-galleries/{id}', [EditCardController::class, 'galleries'])->name('edit.galleries');
            Route::post('update-galleries/{id}', [EditCardController::class, 'updateGalleries'])->name('update.galleries');
            Route::get('edit-business-hours/{id}', [EditCardController::class, 'businessHours'])->name('edit.business.hours');
            Route::post('update-business-hours/{id}', [EditCardController::class, 'updateBusinessHours'])->name('update.business.hours');
            Route::get('clear-business-hours/{id}', [EditCardController::class, 'clearBusinessHours'])->name('clear.business.hours');
            // store
            if (env('APP_TYPE') == 'STORE' || env('APP_TYPE') == 'BOTH') {
                // Create Store
                Route::get('create-store', [StoreController::class, 'CreateStore'])->name('create.store');
                Route::post('save-store', [StoreController::class, 'saveStore'])->name('save.store');
                Route::get('products/{id}', [StoreController::class, 'products'])->name('products');
                Route::post('save-products/{id}', [StoreController::class, 'saveProducts'])->name('save.products');
            }
            // category
            Route::prefix('category')->name('product.category.')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('index');
                Route::post('/store', [ProductCategoryController::class, 'store'])->name('store');
                Route::post('/update/{id}', [ProductCategoryController::class, 'update'])->name('destroy');
                Route::get('/delete/{id}', [ProductCategoryController::class, 'destroy'])->name('destroy2');
            });
            // Edit Store
            Route::get('edit-store/{id}', [StoreController::class, 'editStore'])->name('edit.store');
            Route::post('update-store/{id}', [StoreController::class, 'updateStore'])->name('update.store');
            // Product
            Route::get('products-list/{id}', [StoreController::class, 'storeProductsList'])->name('products.list');
            Route::get('add-products/{id}', [StoreController::class, 'addProducts'])->name('products.add');
            Route::post('store-products/{id}', [StoreController::class, 'storeProducts'])->name('products.store');
            Route::get('edit-products/{id}', [StoreController::class, 'editProducts'])->name('products.edit');
            Route::post('update-products/{id}', [StoreController::class, 'updateProducts'])->name('products.update');
            Route::get('delete-products/{id}', [StoreController::class, 'deleteProducts'])->name('products.delete');
            // Product variant
            Route::get('{card_id}/product/{product_id}/variants', [VariantController::class, 'index'])->name('product.variants');
            Route::post('product/{product_id}/variants/store', [VariantController::class, 'store'])->name('product.variants.store');
            Route::post('product/{variant}/variants/update', [VariantController::class, 'update'])->name('product.variants.update');
            Route::get('product/{variant}/variants/delete', [VariantController::class, 'delete'])->name('product.variants.delete');
            // Product variant Options
            Route::get('product/{product_id}/variants/{variant}', [VariantController::class, 'optionIndex'])->name('product.variants.option');
            Route::get('product/{product_id}/variants/create/{variant}', [VariantController::class, 'optioncreate'])->name('product.variants.option.create');
            Route::post('product/{product_id}/variants/store/{variant}', [VariantController::class, 'optionStore'])->name('product.variants.option.store');
            Route::get('variants/{option}/edit', [VariantController::class, 'optionedit'])->name('variants.option.edit');
            Route::post('variants/{option}/update', [VariantController::class, 'optionUpdate'])->name('variants.option.update');
            Route::get('variants/{option}/delete', [VariantController::class, 'optionDelete'])->name('variants.option.delete');

            Route::get('{card_id}/orders', [OrderController::class, 'index'])->name('order.index');
            Route::get('{card_id}/orders/view/{id}', [OrderController::class, 'view'])->name('order.view');
            //Addtional Tootls -> QR Maker
            Route::get('tools/qr-maker', [AdditionalController::class, 'qrMaker'])->name('qr-maker');
            Route::get('tools/whois-lookup', [AdditionalController::class, 'whoisLookup'])->name('whois-lookup');
            Route::post('tools/whois-lookup', [AdditionalController::class, 'resultWhoisLookup'])->name('result.whois-lookup');
            Route::get('tools/dns-lookup', [AdditionalController::class, 'dnsLookup'])->name('dns-lookup');
            Route::post('tools/dns-lookup', [AdditionalController::class, 'resultDnsLookup'])->name('result.dns-lookup');
            Route::get('tools/ip-lookup', [AdditionalController::class, 'ipLookup'])->name('ip-lookup');
            Route::post('tools/ip-lookup', [AdditionalController::class, 'resultIpLookup'])->name('result.ip-lookup');
            Route::prefix('/setting')->name('setting.')->group(function () {
                Route::get('/payment', [UserSettingsController::class, 'payment'])->name('payment');
                Route::post('/paymentUpdate', [UserSettingsController::class, 'paymentUpdate'])->name('payment.update');
            });
            // state
            Route::prefix('/state')->name('state.')->group(function () {
                Route::get('/', [StateController::class, 'index'])->name('index');
                Route::get('/create', [StateController::class, 'create'])->name('create');
                Route::post('/store', [StateController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [StateController::class, 'edit'])->name('edit');
                Route::post('/{id}/update', [StateController::class, 'update'])->name('update');
                Route::get('/{id}/status', [StateController::class, 'status'])->name('status');
                Route::get('/{id}/delete', [StateController::class, 'delete'])->name('delete');
            });
            // shipping_area
            Route::prefix('/shipping_area')->name('shipping_area.')->group(function () {
                Route::get('/', [ShippingAreaController::class, 'index'])->name('index');
                Route::get('/create', [ShippingAreaController::class, 'create'])->name('create');
                Route::post('store', [ShippingAreaController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ShippingAreaController::class, 'edit'])->name('edit');
                Route::post('/{id}/update', [ShippingAreaController::class, 'update'])->name('update');
                Route::get('/{id}/delete', [ShippingAreaController::class, 'delete'])->name('delete');
            });
        });
        // Transactions
        Route::get('transactions', [userTransactions::class, 'indexTransactions'])->name('transactions');
        Route::get('view-invoice/{id}', [userTransactions::class, 'viewInvoice'])->name('view.invoice');
        // Billing
        Route::get('billing/{id}', [userTransactions::class, 'billing'])->name('billing');
        Route::post('update-billing', [userTransactions::class, 'updateBilling'])->name('update.billing');
        // Checkout
        Route::get('checkout/{id}', [CardController::class, 'checkout'])->name('checkout');
        // Save Upgrade Plan
        Route::post('save-upgrade/{id}', [CardController::class, 'saveUpgrade'])->name('save.upgrade.plan');
        // View Preview Business Card
        Route::get('view-preview/{id}', [CardController::class, 'viewPreview'])->name('view.preview');
        // Account Setting
        Route::get('account', [userAccount::class, 'account'])->name('account');
        Route::get('edit-account', [userAccount::class, 'editAccount'])->name('edit.account');
        Route::post('update-account', [userAccount::class, 'updateAccount'])->name('update.account');
        Route::get('change-password', [userAccount::class, 'changePassword'])->name('change.password');
        Route::post('update-password', [userAccount::class, 'updatePassword'])->name('update.password');
    });
    // Choose Payment Gateway
    Route::post('/prepare-payment/{planId}', [PaymentController::class, 'preparePaymentGateway'])->name('prepare.payment.gateway');
    // PayPal Payment Gateway
    Route::get('/payment-paypal/{planId}', [PaypalController::class, 'paywithpaypal'])->name('paywithpaypal');
    Route::get('/payment/status', [PaypalController::class, 'paypalPaymentStatus'])->name('paypalPaymentStatus');
    // RazorPay
    Route::get('payment-razorpay/{planId}', [RazorpayController::class, 'prepareRazorpay'])->name('paywithrazorpay');
    Route::get('razorpay-payment-status/{oid}/{paymentId}', [RazorpayController::class, 'razorpayPaymentStatus'])->name('razorpay.payment.status');
    // Stripe
    Route::get('/payment-stripe/{planId}', [StripeController::class, 'stripeCheckout'])->name('paywithstripe');
    Route::post('/stripe-payment-status/{paymentId}', [StripeController::class, 'stripePaymentStatus'])->name('stripe.payment.status');
    Route::get('/stripe-payment-cancel/{paymentId}', [StripeController::class, 'stripePaymentCancel'])->name('stripe.payment.cancel');
    // Offline
    Route::get('/payment-offline/{planId}', [OfflineController::class, 'offlineCheckout'])->name('paywithoffline');
    Route::post('/mark-offline-payment', [OfflineController::class, 'markOfflinePayment'])->name('mark.payment.payment');
    // Google Auth
    Route::get('/google-login', [LoginController::class, 'redirectToProvider'])->name('login.google');
    Route::get('/sign-in-with-google', [LoginController::class, 'handleProviderCallback']);
    // Profile
    // Route::get('{id}', [ProfileController::class, 'profile', 'ShareWidget'])->name('profile');
    Route::get('/download/{id}', [ProfileController::class, 'downloadVcard'])->name('download.vCard');
});
// product details
Route::get('{cardUrl}/details/{id}', [HomeController::class, 'productDetails'])->name('product.details');

// cart
Route::get('{cardUrl}/cart', [CartController::class, 'cartPage'])->name('cart');
Route::patch('update-cart', [CartController::class, 'cartUpdate'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'cartRemove'])->name('remove.from.cart');
Route::post('addtocart', [CartController::class, 'addToCart'])->name('addtocart');

// checkout
Route::get('{cardUrl}/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('{cardUrl}/checkout', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
Route::get('{cardUrl}/checkout/billing-address', [CheckoutController::class, 'checkoutBilling'])->name('checkout.billing');
Route::post('{cardUrl}/checkout/billing-address', [CheckoutController::class, 'checkoutBillingStore'])->name('checkout.billing.store');
Route::get('{cardUrl}/checkout/payment', [CheckoutController::class, 'checkoutPayment'])->name('checkout.payment');
Route::get('{cardUrl}/checkout/payment/stripe', [CheckoutController::class, 'checkoutPaymentSrtipe'])->name('checkout.payment.stripe');
Route::post('{cardUrl}/checkout/payment/stripe/{paymentId}', [CheckoutController::class, 'checkoutPaymentSrtipeStore'])->name('checkout.payment.stripe.store');


// getpreview
Route::get('{cardurl}', [HomeController::class, 'getPreview'])->name('card.preview');
Route::post('/place-email-order', [HomeController::class, 'placeEmailOrder'])->name('place.email.order');
Route::get('download/{id}', [HomeController::class, 'downloadVcard'])->name('download.vCard');
