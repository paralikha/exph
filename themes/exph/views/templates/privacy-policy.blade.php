{{--
Template Name: Privacy Policy Template
Description: A page for all experiences.
Author: Princess Ellen Alto
Version: 1.0
--}}

@extends("Theme::layouts.auth")

@section("content")
    <v-card class="elevation-1 sticky">
        <v-toolbar class="elevation-0 white">
            @include("Theme::partials.navigation")
        </v-toolbar>
    </v-card>

    <v-card class="elevation-1">
        <v-card-media src="{{ assets('frontier/images/placeholder/gradient.png') }}" height="300">
            <v-layout
                column
                align-center
                justify-center
                class="white--text"
                >
                <div class="insert-overlay" style="background: rgba(0, 0, 0, 0.3); position: absolute; width: 100%; height: 100%; top: 0;"></div>
                <v-card dark class="elevation-0 transparent text-xs-center">
                    <v-card-text>
                        <h3><strong>{{ __('Privacy Policy') }}</strong></h3>
                    </v-card-text>
                </v-card>
            </v-layout>
        </v-card-media>
    </v-card>
    <v-container fluid grid-list-lg>
        <v-layout row wrap align-center justify-center>
            <v-flex lg7 md8 sm12 xs12>
                <v-layout row wrap>
                    <v-flex xs12>
                        <v-card class="elevation-1">
                            <v-toolbar class="elevation-0 white">
                                <v-toolbar-title>{{ __('Policies') }}</v-toolbar-title>
                            </v-toolbar>
                            <v-divider></v-divider>
                            <div class="pa-3">
                                {{-- <v-card-text>
                                    <div class="pt-3 subheading">
                                        We, Experience Philippines, are committed to safeguarding your privacy. This privacy policy explains how we will treat any personal information you supply to us, or we collect from you on www.experience.ph, and how your personal data will be processed by us as the ‘data controller of your data’ as set out in the Republic Act No. 10173, known as the “Data Privacy Act of 2012. Please read this policy carefully to understand our views and practices regarding your personal data and how it affects your legal rights. If you do not agree with this policy please do not use the Websites.
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">1. Information collected</div>
                                    <div class="pt-2 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3">
                                                1.1 We may collect and store information you provide on the Websites for the purposes of:
                                            </div>
                                            <div class="pl-5">
                                                <ol>
                                                    <li>purchasing or receiving our goods or services;</li>
                                                    <li>using the feedback facility;</li>
                                                    <li>entering competitions, including any competitions organised and fulfilled by third parties;</li>
                                                    <li>participating in surveys and research;</li>
                                                    <li>completing enquiry or filling in any forms;</li>
                                                    <li>supplying us with information for publication on the Websites;</li>
                                                    <li>any other communication you have with us for any other reason;</li>
                                                    <li>when and if you report a problem with the Website (or sites).</li>
                                                </ol>
                                            </div>
                                            <div class="pl-3">
                                                1.2 We may also collect and store information about your computer and about your visits to and use of the Websites (including your IP address, geographical location, browser type, referral source, length of visit and number of page views).
                                            </div>
                                        </div>

                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">2. Use of Cookies</div>
                                    <div class="pt-3 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3 py-3">
                                                2.1 We may gather information about your use of the Websites by using a cookie file. When used, these cookies are downloaded to your computer automatically. The cookie file is stored on the hard drive of your computer as cookies contain information that is transferred to your computer’s hard drive.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.2 When used, a session cookie will keep track of you whilst you navigate the Websites.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.3 When used, a persistent cookie will enable the Websites to recognise you when you re-visit the Websites.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.4 All computers have the ability to decline cookies. Please note, should you decline cookies, you may not be able to access certain areas of the Websites.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.5 We use cookies to analyse the use of the Websites. This enables statistical and other reports to be produced about the use of the Websites but such reports will not identify you personally.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.6 To store information about your preferences and so allow us to customise the Websites according to you individual interests.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.7 To speed up your searches.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.8 Our advertisers and third party suppliers whose websites can be accessed via the Websites also use cookies, over which Columbus Travel Media does not have access to or control. Such cookies (if used) will be downloaded once you click on an advertisement on the Websites or transfer to a third party’s website, you should read the third parties website privacy policy before continuing.
                                            </div>
                                            <div class="pl-3 py-3">
                                                2.9 From time to time we may permit third party companies to set cookies on our sites for purposes which may include market research, serving advertisements, revenue tracking or to improve functionality of the site.
                                            </div>
                                        </div>
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">3. Web Analytics</div>
                                    <div class="pt-3 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3 py-3">
                                                The Websites use web analytics services provided by Google, Inc. each of which uses cookies to help us to analyse how users use the Websites. The information generated by the cookie about your use of the Websites (including your IP address) will be transmitted to and stored on servers in the United States. They will use this information for the purpose of evaluating your use of our sites, compiling reports on website activity for us and providing other services relating to website activity and internet usage. They may also transfer this information to third parties where required to do so by law, or where such third parties process the information on their behalf. They will not associate your IP address with any other data held by Google, Inc. If you wish to refuse the use of cookies by Google please visit http://tools.google.com/dlpage/gaoptout . You may also refuse the use of cookies by selecting the appropriate settings on your browser, however please note that if you do this you may not be able to use the full functionality of the Websites. By using the Websites, you consent to the processing of data about you by those service providers in the manner and for the purposes set out above. If you want to find out more about how to disable cookies please see this external third party website www.allaboutcookies.org/manage-cookies.
                                                <br><br>
                                                Some of the advertisements you see on the Websites are generated by third party service providers. Some of these third parties generate cookies for statistical purposes on behalf of Columbus Travel Media, for example, for tracking how many unique users have seen a particular advertisement, and how many times they have seen it, and for providing you with advertisements that are more relevant to your interests. They do not contain personal information such as your name or email address. Columbus Travel Media do not have access to these cookies, although, in order to provide you with a better user experience, we may use statistical information arising from the cookies provided by Yahoo! Network to build up a profile based on your browsing patterns across the Websites and third party websites that are part of the Yahoo! network. This profile enables us to make advertisements available to you that are more relevant and tailored to your interests.
                                            </div>
                                        </div>
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">4. Tranferral of Data</div>
                                    <div class="pt-3 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3 py-3">
                                                4.1 Risks Involved in Transmitting Personal Data Over the internet
                                                Unfortunately, the transmission of information via the internet is not completely secure. So, whilst Experience Philippines will do its best to protect your personal data, we cannot ensure the security of data transmitted by you to the Site. Any transmission is at your own risk. Once we have received your information we will use security procedures and features to prevent unauthorised access to it.
                                            </div>
                                        </div>
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">5. Use of your Information</div>
                                    <div class="pt-3 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3 py-2">
                                                5.1 We will use your information to:
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.1 administer the Websites;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.2 enable us to provide, and you to use, the goods, services, and facilities on the Websites;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.3 deliver to you any goods purchased from us;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.4 send to you statements and invoices, and to collect from you payment, for goods, services or facilities purchased from us;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.5 send to you future marketing information regarding our goods, services, facilities and other features;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.6 send to you marketing and other commercial information about the goods or services offered by our commercial partners;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.7 allow our commercial partners to contact you directly with marketing and other commercial information about their goods or services;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.8 publishing information you have supplied to us on the Websites, where you have supplied such information to us for such purposes; and
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.9 enable us to deal with any complaints or queries raised by you;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.10 allow you to participate in interactive features of our services where you choose to do so;
                                            </div>
                                            <div class="pl-5 py-2">
                                                5.1.11 to notify you of any changes to our services.
                                            </div>
                                            <div class="pl-3 py-3">
                                                5.2 Please contact us at www.experience.ph/contact-us/  at any time if you do not want your information to be used in the manner set out in clauses 5.1.5 or 5.1.6 or 5.1.7 above.
                                            </div>
                                        </div>
                                    </div>
                                </v-card-text>
                                <v-card-text>
                                    <div class="subheading fw-500 mb-2 grey--text text--darken-2">6. Sharing your information</div>
                                    <div class="pt-3 subheading">
                                        <div class="pl-4">
                                            <div class="pl-3 py-3">
                                                6.1 We may disclose your personal information to any member of our group which means our subsidiaries, our ultimate holding company and its subsidiaries.
                                            </div>
                                            <div class="pl-3 py-3">
                                                6.2 In addition, we may disclose information about you:
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.2.1 to the extent that we are required to do so by law;
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.2.2 in connection with any legal proceedings or prospective legal proceedings;
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.2.3 in order to establish, exercise or defend our legal rights (including providing information to others for the purposes of fraud prevention and reducing credit risk);
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.2.4 in the event that we offer to sell any asset, in which case we may disclose your personal data to the potential purchaser of such assets;
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.2.5 if substantially all of Columbus Travel Media’s assets are acquired by a third party, in which case personal data held by us about our customers will be transferred to such third party.
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.3 We may also use your data or permit selected third parties to use your data to provide you with information about goods and services which may be of interest to you unless you have notified us that you do not wish to receive such information.
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.4 We do not disclose individual information to our advertisers, but we may provide them with aggregated information about our users and the number of visitors our web site(s) receives.
                                            </div>
                                            <div class="pl-5 py-2">
                                                6.5 We may also use such aggregated information to help advertisers reach the kind of audiences they want to target. We comply with our advertisements wishes by displaying their advertisements to that target audience using the personal data we have collected from you and from others.
                                            </div>
                                        </div>
                                    </div>
                                </v-card-text> --}}
                                <v-card-text>
                                    <ol>
                                        <li class="subheading fw-500 mb-2 grey--text text--darken-2">Information collected
                                            <ol class="subheading">
                                                <li>We may collect and store information you provide on the Websites for the purposes of:
                                                    <ol class="subheading">
                                                        <li>purchasing or receiving our goods or services;</li>
                                                        <li>using the feedback facility;</li>
                                                        <li>entering competitions, including any competitions organised and fulfilled by third parties;</li>
                                                        <li>participating in surveys and research;</li>
                                                        <li>completing enquiry or filling in any forms;</li>
                                                        <li>supplying us with information for publication on the Websites;</li>
                                                        <li>any other communication you have with us for any other reason;</li>
                                                        <li>when and if you report a problem with the Website (or sites).</li>
                                                    </ol>
                                                </li>
                                                <li>We may also collect and store information about your computer and about your visits to and use of the Websites (including your IP address, geographical location, browser type, referral source, length of visit and number of page views).</li>
                                            </ol>
                                        </li>
                                        <li class="subheading fw-500 mb-2 grey--text text--darken-2">Use of Cookies
                                            <ol class="subheading">
                                                <li> We may gather information about your use of the Websites by using a cookie file. When used, these cookies are downloaded to your computer automatically. The cookie file is stored on the hard drive of your computer as cookies contain information that is transferred to your computer’s hard drive.</li>
                                                <li>When used, a session cookie will keep track of you whilst you navigate the Websites.</li>
                                                <li>When used, a persistent cookie will enable the Websites to recognise you when you re-visit the Websites.</li>
                                                <li>All computers have the ability to decline cookies. Please note, should you decline cookies, you may not be able to access certain areas of the Websites.</li>
                                                <li> All computers have the ability to decline cookies. Please note, should you decline cookies, you may not be able to access certain areas of the Websites.</li>
                                                <li>To store information about your preferences and so allow us to customise the Websites according to you individual interests.</li>
                                                <li>To speed up your searches</li>
                                                <li>Our advertisers and third party suppliers whose websites can be accessed via the Websites also use cookies, over which Columbus Travel Media does not have access to or control. Such cookies (if used) will be downloaded once you click on an advertisement on the Websites or transfer to a third party’s website, you should read the third parties website privacy policy before continuing.</li>
                                                <li>From time to time we may permit third party companies to set cookies on our sites for purposes which may include market research, serving advertisements, revenue tracking or to improve functionality of the site.</li>
                                            </ol>
                                        </li>
                                        <li class="subheading fw-500 mb-2 grey--text text--darken-2">Web Analytics
                                            <ol class="subheading">
                                                <li></li>
                                            </ol>
                                        </li>
                                    </ol>
                                </v-card-text>
                            </div>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>

    @include("Public::sections.footer")
@endsection

@push('css')
    <style>
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        ol {
            counter-reset: nav-counter;
            margin: 0;
        }
        li {
            counter-increment: nav-counter;
        }
        li::before {
            content: counter(nav-counter);
            color: #616161;
            padding-right: 0.6em;
        }
        li li::before {
             content: counters(nav-counter, ".") "";
        }
        ol, li {
            list-style: none;
        }
        ol li {
            padding-top: 10px!important;
            padding-bottom: 10px!important;
        }
    </style>
@endpush

@push('pre-scripts')
    <script src="{{ assets('frontier/vendors/vue/resource/vue-resource.min.js') }}"></script>
    <script>
        Vue.use(VueResource);

        mixins.push({
            data () {
                return {

                }
            },
        });
    </script>
@endpush
