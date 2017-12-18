<v-card>
    <v-toolbar dark class="blue elevation-1">
        <v-toolbar-title>Multi-Traveler - Roadtrip: 3-Day Weekend Checkout</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon @click.native="dialog.budget = false">
            <v-icon>close</v-icon>
        </v-btn>
    </v-toolbar>
    <v-card-text class="pa-0 subheading">
        <v-flex xs12>
            <v-stepper v-model="e1" class="elevation-0">
                <v-stepper-header class="elevation-0 mb-4 grey lighten-3 sticky">
                    <v-stepper-step step="1" editable :complete="e1 > 1"></v-stepper-step>
                    <v-divider></v-divider>
                    <v-stepper-step step="2" editable :complete="e1 > 2"></v-stepper-step>
                    <v-divider></v-divider>
                    <v-stepper-step step="3" editable :complete="e1 > 3"></v-stepper-step>
                    <v-divider></v-divider>
                    <v-stepper-step step="4" editable :complete="e1 > 4"></v-stepper-step>
                </v-stepper-header>

                <v-stepper-content step="1" class="pa-0">
                    <v-layout row wrap align-center justify-center>
                        <v-flex md6 xs12>
                            <v-card-text>
                                <p>This trip option requires that you have your own car and a valid driver's license. Please confirm that you understand this condition! *</p>
                                <v-checkbox
                                    label="Yes! I have my own car and valid driver's license and I'm ready to hit the road."
                                    color="success"
                                    v-model="a1"
                                    class="pt-0 inline-block">
                                </v-checkbox>
                            </v-card-text>
                            <v-card-text>
                                <p>I acknowledge that this is the Multi-Traveler option, which is for more than one person.</p>
                                <v-checkbox
                                    label="Yes, I’ve got a travel companion!"
                                    color="success"
                                    v-model="a2"
                                    class="pt-0">
                                </v-checkbox>
                            </v-card-text>

                            <v-card-text>
                                <p><strong>Date of Departure *</strong></p>
                                <p>All trips are 2 nights, 3 days.</p>

                                <v-layout row wrap>
                                    <v-flex xs4>
                                        <v-menu
                                            :close-on-content-click="false"
                                            v-model="menu"
                                            transition="scale-transition"
                                            right
                                            bottom
                                            full-width
                                            max-width="290px"
                                            min-width="290px"
                                            class="elevation-1"
                                            >
                                            <v-text-field
                                                slot="activator"
                                                append-icon="date_range"
                                                light solo hide-details single-line
                                                placeholder="Select Date"
                                                v-model="schedule"
                                                class="elevation-1"
                                                readonly
                                            ></v-text-field>
                                            <v-date-picker v-model="to" no-title scrollable actions>
                                            </v-date-picker>
                                        </v-menu>
                                    </v-flex>
                            </v-card-text>

                            <v-card-text>
                                <p><strong>Any time restrictions? *</strong></p>
                                <p>Are there any time restrictions for your departure or arrival?  ("I can only leave after 5PM on Friday" or "I need to be home by 9PM on Sunday")</p>
                                <v-flex md8 xs12>
                                    <v-text-field
                                        name="input-1"
                                        placeholder="I can only leave after 5PM on my departure date. I need to be home by 9PM on Sunday."
                                        textarea
                                        row="3"
                                        class="budget-form"
                                    ></v-text-field>
                                </v-flex>
                            </v-card-text>
                            <v-card-text class="text-xs-center">
                                <v-btn @click.native="e1 = 2" outline primary>Next</v-btn>
                            </v-card-text>
                        </v-flex>
                    </v-layout>
                </v-stepper-content>

                <v-stepper-content step="2" class="pa-0">
                    <v-layout row wrap align-center justify-center>
                        <v-flex md6 xs12>
                            <v-card-text>
                                <p>This trip option requires that you have your own car and a valid driver's license. Please confirm that you understand this condition! *</p>
                                <v-checkbox
                                    label="Nature"
                                    color="success"
                                    v-model="b1">
                                </v-checkbox>
                                <v-checkbox
                                    label="Adventure"
                                    color="success"
                                    v-model="b2">
                                </v-checkbox>
                                <v-checkbox
                                    label="Sports"
                                    color="success"
                                    v-model="b3">
                                </v-checkbox>
                                <v-checkbox
                                    label="Heritage"
                                    color="success"
                                    v-model="b4">
                                </v-checkbox>
                                <v-checkbox
                                    label="Business"
                                    color="success"
                                    v-model="b5">
                                </v-checkbox>
                            </v-card-text>
                            <v-card-text>
                                <p><strong>Do you have any dietary restrictions?</strong></p>
                                <p>We'll be sure to cater your recommendations to these needs.</p>
                                <v-flex md8 xs12>
                                    <v-text-field
                                        name="input-1"
                                        placeholder="I can only leave after 5PM on my departure date. I need to be home by 9PM on Sunday."
                                        textarea
                                        row="3"
                                        class="budget-form"
                                    ></v-text-field>
                                </v-flex>
                            </v-card-text>
                            <v-card-text class="text-xs-center">
                                <v-btn @click.native="e1 = 3" outline primary>Next</v-btn>
                            </v-card-text>
                        </v-flex>
                    </v-layout>
                </v-stepper-content>

                <v-stepper-content step="3" class="pa-0">
                    <v-container fluid grid-list-lg>
                        <v-layout row wrap align-center justify-center>
                            <v-flex md6 xs12>
                                <v-card-text>
                                    <p><strong>Full Name - Traveler 1</strong></p>
                                    <p>Please make sure spelling matches your ID!</p>
                                    <v-layout row wrap>
                                        <v-flex xs6>
                                            <v-text-field
                                                label="{{ _('First Name') }}"
                                                name="firstname"
                                                required
                                                value="">
                                            </v-text-field>
                                        </v-flex>
                                        <v-flex xs6>
                                            <v-text-field
                                                label="{{ _('Last Name') }}"
                                                name="lastname"
                                                required
                                                value="">
                                            </v-text-field>
                                        </v-flex>
                                    </v-layout>
                                </v-card-text>
                                <v-card-text>
                                    <p><strong>Email Address - Traveler 1</strong></p>
                                    <p>You will receive all confirmations via email.</p>
                                    <v-text-field
                                        label="E-mail Address"
                                        required
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-text>
                                    <p><strong>Phone - Traveler 1</strong></p>
                                    <p>We will use this number to contact you in case of emergency.</p>
                                    <v-text-field
                                        label="Phone/Mobile Number"
                                        required
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-text>
                                    <p><strong>Address - Traveler 1</strong></p>
                                    <p>This is where your envelope will be sent</p>
                                    <v-text-field
                                        label="Address 1"
                                        required
                                        class="mt-2"
                                    ></v-text-field>
                                    <v-text-field
                                        label="Address 2"
                                        required
                                        class="mt-2"
                                    ></v-text-field>
                                    <v-layout row wrap>
                                        <v-flex xs6>
                                            <v-text-field
                                                label="City"
                                                required
                                                class="mt-2"
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex xs6>
                                            <v-text-field
                                                label="State/Province"
                                                required
                                                class="mt-2"
                                            ></v-text-field>
                                        </v-flex>
                                    </v-layout>
                                    <v-text-field
                                        label="Country"
                                        required
                                        class="mt-2"
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-text class="text-xs-center">
                                    <v-btn @click.native="e1 = 4" outline primary>Next</v-btn>
                                </v-card-text>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-stepper-content>

                <v-stepper-content step="4" class="pa-0">
                    <v-card-text>
                        <p><strong>Would you like to receive a quote on travel insurance? *</strong></p>
                        <p>Rates vary trip to trip. We'll reach out quickly with a quote for your specific trip and we'll only charge you if you decide that you want travel insurance coverage. </p>

                        <p class="caption">
                            PLEASE NOTE: If you choose not to purchase travel insurance, we cannot guarantee any refunds based on weather delays/cancellations or personal conflicts/changes. This will also protect against any additional fees that might be incurred should your plans change for any reason.
                        </p>

                        <v-radio-group v-model="insurance" :mandatory="false">
                            <v-radio color="success" label="Yes, I want a quote on travel insurance" value="radio-1"></v-radio>
                            <v-radio color="success" label="No, I'm willing to take the risk" value="radio-2"></v-radio>
                        </v-radio-group>
                    </v-card-text>
                    <v-card-text class="text-xs-center">
                        <v-btn @click.native="dialog.budget = false" primary outline>Get Going</v-btn>
                    </v-card-text>
                </v-stepper-content>
            </v-stepper>
        </v-flex>
    </v-card-text>
</v-card>

@push('css')
    <style>
        .budget-form .input-group__input {
            border: 1px solid #afafaf !important;
            border-radius: 5px !important;
            padding-top: 10px !important;
        }
    </style>
@endpush
