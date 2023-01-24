<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Home Page
        // Banner
        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_title',
            'section_content' => 'Create your Digital Business Card'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_description',
            'section_content' => 'GoBiz is a Digital Business Card Maker. You can create your own digital vcard to attract your customers.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_button_1',
            'section_content' => 'Sign up now'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_button_1_link',
            'section_content' => '/login'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_button_2',
            'section_content' => 'How it works'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'banner',
            'section_title' => 'banner_button_2_link',
            'section_content' => '#how-it-works'
        ]);

        // How to Works
        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_mini_title',
            'section_content' => 'How it works?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_title',
            'section_content' => 'Create, share & get more customers'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_description',
            'section_content' => 'Register a new account, create your own digital business card, share your unique link and get more customers.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_li_title_1',
            'section_content' => 'Create business card'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_li_title_2',
            'section_content' => 'Share your link'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_li_title_3',
            'section_content' => 'Get more customers'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_title_1',
            'section_content' => 'Photo gallery'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_description_1',
            'section_content' => 'You can show case your product images on your business card.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_title_2',
            'section_content' => 'Services Listing'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_description_2',
            'section_content' => 'You can list your services with explaination content and enquiry button. This helps you for high chance to convert your visitor into business lead.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_title_3',
            'section_content' => 'Save vCard'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_description_3',
            'section_content' => 'Visitor can save your phone number as vCard file format.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_title_4',
            'section_content' => 'Best for Businesses'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'works',
            'section_title' => 'work_card_description_4',
            'section_content' => 'GoBiz Digital Business cards will help you to transform your card visitors into customers.'
        ]);

        // Features
        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_mini_title',
            'section_content' => 'Why Digital Business Card?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_title',
            'section_content' => 'vCard Features'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_title_1',
            'section_content' => 'WhatsApp Enabled'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_1',
            'section_content' => 'You can enable and disable WhatsApp Chat Feature in your digital business card.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_2',
            'section_content' => 'Photo Gallery'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_2',
            'section_content' => 'You can upload product photos or any business related photos in your gallery section.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_3',
            'section_content' => 'Services Section'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_3',
            'section_content' => 'You can list your all services with image and description in this section.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_4',
            'section_content' => 'Payment Details'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_4',
            'section_content' => 'You can list your all accepted payment methods in your digital business card.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_5',
            'section_content' => 'Business Hours'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_5',
            'section_content' => 'You can display your business opening hours. Your customer can easily understand when you are available.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_6',
            'section_content' => 'YouTube Link Integraion'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_6',
            'section_content' => 'You can integrate your YouTube Link with your digital business card.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_7',
            'section_content' => 'Google Maps Integraion'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_7',
            'section_content' => 'You can display your shop / business location in google maps. Visitors can easily find you.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_8',
            'section_content' => 'Social Media Links'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_8',
            'section_content' => 'Your all social media presence in one digital business card. Stay connect with your customers.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_9',
            'section_content' => 'Modern Theme'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_9',
            'section_content' => 'We used modern theme for user interface. It is fully responsive.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_10',
            'section_content' => 'Clean UI Design'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_10',
            'section_content' => 'We creafted all designs professionally. It made with latest frameworks.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_11',
            'section_content' => 'Faster Loading'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_11',
            'section_content' => 'We give more importance for page load. Your digital card load faster than normal webpages.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_12',
            'section_content' => 'Unique Link'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'features',
            'section_title' => 'feature_card_description_12',
            'section_content' => 'Your name or business whatever it is. You can generate your business card link as per your choice.'
        ]);

        // Pricing
        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'pricing',
            'section_title' => 'pricing_mini_title',
            'section_content' => 'Pricing'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'pricing',
            'section_title' => 'pricing_title',
            'section_content' => 'Choose your best plan'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'home',
            'section_name' => 'pricing',
            'section_title' => 'pricing_subtitle',
            'section_content' => 'Good investments will gives you 10x more revenue.'
        ]);

        // FAQ
        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_title',
            'section_content' => 'Frequently Asked Question'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_description',
            'section_content' => 'The most common questions about how our business works and what can do for you.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_1',
            'section_content' => 'How Long is this site live?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_1',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_2',
            'section_content' => 'Can I install/upload anything I want on there?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_2',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_3',
            'section_content' => 'How can I migrate to another site?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_3',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_4',
            'section_content' => 'Can I change the domain you give me?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_4',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_5',
            'section_content' => 'How many sites I can create at once?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_5',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_question_6',
            'section_content' => 'How can I communicate with you?'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'faq',
            'section_name' => 'faq',
            'section_title' => 'faq_answer_6',
            'section_content' => 'Laboris qui labore cillum culpa in sunt quis sint veniam. Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis minim velit nostrud pariatur culpa magna in aute.'
        ]);

        // Support
        DB::table('pages')->insert([
            'page_name' => 'footer support email',
            'section_name' => 'support',
            'section_title' => 'support_email',
            'section_content' => 'support@gobiz.co.in'
        ]);

        // Privacy Policy
        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_title',
            'section_content' => 'Privacy Policy for GoBiz'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'At GoBiz, accessible from https://gobiz.goapps.online/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by GoBiz and how we use it.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in GoBiz. This policy is not applicable to any information collected offline or via channels other than this website.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Consent'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'By using our website, you hereby consent to our Privacy Policy and agree to its terms.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Information we collect'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'How we use your information'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'We use the information we collect in various ways, including to:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' =>
            '
            1. Provide, operate, and maintain our website
            2. Improve, personalize, and expand our website
            3. Understand and analyze how you use our website
            4. Develop new products, services, features, and functionality
            5. Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes
            6. Send you emails
            7. Find and prevent fraud
            '
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Log Files'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'GoBiz follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services analytics.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users movement on the website, and gathering demographic information.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Cookies and Web Beacons'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Like any other website, GoBiz uses cookies. These cookies are used to store information including visitors preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users experience by customizing our web page content based on visitors browser type and/or other information.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'For more general information on cookies, please read "What Are Cookies".'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Advertising Partners Privacy Policies'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'You may consult this list to find the Privacy Policy for each of the advertising partners of GoBiz.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on GoBiz, which are sent directly to users browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Note that GoBiz has no access to or control over these cookies that are used by third-party advertisers.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Third Party Privacy Policies'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'GoBizs Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers respective websites.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'CCPA Privacy Rights (Do Not Sell My Personal Information)'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Under the CCPA, among other rights, California consumers have the right to:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Request that a business that collects a consumers personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Request that a business delete any personal data about the consumer that a business has collected.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Request that a business that sells a consumers personal data, not sell the consumers personal data.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'GDPR Data Protection Rights'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to erasure – You have the right to request that we erase your personal data, under certain conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_title',
            'section_content' => 'Childrens Information'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'privacy',
            'section_name' => 'privacy',
            'section_title' => 'privacy_content_description',
            'section_content' => 'GoBiz does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.'
        ]);

        // Terms and Conditions
        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Terms and Conditions'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Welcome to GoBiz!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'These terms and conditions outline the rules and regulations for the use of GoBizs Website, located at https://gobiz.goapps.online/.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'By accessing this website we assume you accept these terms and conditions. Do not continue to use GoBiz if you do not agree to take all of the terms and conditions stated on this page.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Cookies'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We employ the use of cookies. By accessing GoBiz, you agreed to use cookies in agreement with the GoBizs Privacy Policy.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'License'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Unless otherwise stated, GoBiz and/or its licensors own the intellectual property rights for all material on GoBiz. All intellectual property rights are reserved. You may access this from GoBiz for your own personal use subjected to restrictions set in these terms and conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'You must not:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '
            1. Republish material from GoBiz
            2. Sell, rent or sub-license material from GoBiz
            3. Reproduce, duplicate or copy material from GoBiz
            4. Redistribute content from GoBiz
            '
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'This Agreement shall begin on the date hereof.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. GoBiz does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of GoBiz,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, GoBiz shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'GoBiz reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'You warrant and represent that:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '1. You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;
            2. The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;
            3. The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy
            4. The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'You hereby grant GoBiz a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Hyperlinking to our Content'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'The following organizations may link to our Website without prior written approval:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '1. Government agencies;
            2. Search engines;
            3. News organizations;
            4. Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and
            5. System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We may consider and approve other link requests from the following types of organizations:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '1. commonly-known consumer and/or business information sources;
            2. dot.com community sites;
            3. associations or other groups representing charities;
            4. online directory distributors;
            5. internet portals;
            6. accounting, law and consulting firms; and
            7. educational institutions and trade associations.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of GoBiz; and (d) the link is in the context of general resource information.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to GoBiz. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Approved organizations may hyperlink to our Website as follows:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '1. By use of our corporate name; or
            2. By use of the uniform resource locator being linked to; or
            3. By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'No use of GoBizs logo or other artwork will be allowed for linking absent a trademark license agreement.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'iFrames'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Content Liability'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Reservation of Rights'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Removal of links from our website'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_title',
            'section_content' => 'Disclaimer'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => '1. limit or exclude our or your liability for death or personal injury;
            2. limit or exclude our or your liability for fraud or fraudulent misrepresentation;
            3. limit any of our or your liabilities in any way that is not permitted under applicable law; or
            4. exclude any of our or your liabilities that may not be excluded under applicable law.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'terms',
            'section_name' => 'terms',
            'section_title' => 'term_content_description',
            'section_content' => 'As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'footer',
            'section_name' => 'footer',
            'section_title' => 'social-facebook',
            'section_content' => '#'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'footer',
            'section_name' => 'footer',
            'section_title' => 'social-twitter',
            'section_content' => '#'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'footer',
            'section_name' => 'footer',
            'section_title' => 'social-instagram',
            'section_content' => '#'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'footer',
            'section_name' => 'footer',
            'section_title' => 'social-linkedIn',
            'section_content' => '#'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'refund-title',
            'section_content' => 'Return and Refund Policy'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'refund-desc',
            'section_content' => 'Last updated: August 20, 2021'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Thank you for shopping at GoBiz.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'If, for any reason, You are not completely satisfied with a purchase We invite You to review our policy on refunds and returns.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'The following terms are applicable for any products that You purchased with Us.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Interpretation and Definitions'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Interpretation'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Definitions'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'For the purposes of this Return and Refund Policy:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '1. Company referred to as either the Company We, Us or Our in this Agreement) refers to GoBiz, Chennai.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '2. Goods refer to the items offered for sale on the Service.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '3. Orders mean a request by You to purchase Goods from Us.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '4. Service refers to the Website.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '5. Website refers to GoBiz, accessible from https://gobiz.goapps.online'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '6. You means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Your Order Cancellation Rights'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'You are entitled to cancel Your Order within 7 days without giving any reason for doing so.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'The deadline for cancelling an Order is 7 days from the date on which You received the Goods or on which a third party you have appointed, who is not the carrier, takes possession of the product delivered.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'In order to exercise Your right of cancellation, You must inform Us of your decision by means of a clear statement. You can inform us of your decision by:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'By email: support@goapps.co.in'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'We will reimburse You no later than 14 days from the day on which We receive the returned Goods. We will use the same means of payment as You used for the Order, and You will not incur any fees for such reimbursement.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Conditions for Returns'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'In order for the Goods to be eligible for a return, please make sure that:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '1. The Goods were purchased in the last 7 days'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'The following Goods cannot be returned:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '1. The supply of Goods made to Your specifications or clearly personalized.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '2. The supply of Goods which according to their nature are not suitable to be returned, deteriorate rapidly or where the date of expiry is over.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '3. The supply of Goods which are not suitable for return due to health protection or hygiene reasons and were unsealed after delivery.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => '4. The supply of Goods which are, after delivery, according to their nature, inseparably mixed with other items.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'We reserve the right to refuse returns of any merchandise that does not meet the above return conditions in our sole discretion.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Only regular priced Goods may be refunded. Unfortunately, Goods on sale cannot be refunded. This exclusion may not apply to You if it is not permitted by applicable law.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Returning Goods'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'You are responsible for the cost and risk of returning the Goods to Us. You should send the Goods at the following address:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Chennai,
            Tamilnadu, 600028
            India'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'We cannot be held responsible for Goods damaged or lost in return shipment. Therefore, We recommend an insured and trackable mail service. We are unable to issue a refund without actual receipt of the Goods or proof of received return delivery.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'Contact Us'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'If you have any questions about our Returns and Refunds Policy, please contact us:'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'refund',
            'section_name' => 'refund',
            'section_title' => 'desc',
            'section_content' => 'By email: support@domain.com'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_name',
            'section_content' => 'Contact'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_subtitle',
            'section_content' => 'Got any question? Let’s talk about it.'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_1',
            'section_content' => 'Office'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_1_content_1',
            'section_content' => '359 Hidden'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_1_content_2',
            'section_content' => 'Valley Road, NY'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_2',
            'section_content' => 'Contacts'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_2_content_1',
            'section_content' => 'hello@gmail.com'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_2_content_1',
            'section_content' => '+48 698 033 101'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'contact',
            'section_name' => 'contact',
            'section_title' => 'page_section_3',
            'section_content' => 'Socials'
        ]);

        // About us
        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_title',
            'section_content' => 'About us'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Welcome to GoBiz!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_title',
            'section_content' => 'About the company'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);

        DB::table('pages')->insert([
            'page_name' => 'about',
            'section_name' => 'about',
            'section_title' => 'about_content_description',
            'section_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, dolorum. Id labore nulla ullam eius, dolor maxime quas repudiandae officia doloribus debitis eos reprehenderit odit!'
        ]);
    }
}
