<template>
    <loading-view :loading="loading">
        <heading class="mb-3">{{__("Update Profile")}}</heading>

        <card class="overflow-hidden">
            <form @submit.prevent="saveProfile">
                <!-- Validation Errors -->
                <validation-errors :errors="validationErrors"/>

                <!-- Fields -->
                <div v-for="field in fields">
                    <component
                        :is="'form-' + field.component"
                        :errors="validationErrors"
                        :resource-name="resourceName"
                        :field="field"
                        :via-resource="viaResource"
                        :via-resource-id="viaResourceId"
                        :via-relationship="viaRelationship"
                    />
                </div>

                <!-- Create Button -->
                <div class="bg-30 flex px-8 py-4">
                    <button dusk="create-and-add-another-button" class="ml-auto btn btn-default btn-primary mr-3">
                        {{__('Save Profile')}}
                    </button>
                </div>
            </form>
        </card>
    </loading-view>
</template>

<script>
    import { Errors, Minimum } from 'laravel-nova'

    export default {

        data: () => ({
            loading: false,
            fields: [
                {
                    component: "text-field",
                    prefixComponent: true,
                    indexName: "Name",
                    name: "Name",
                    attribute: "name",
                    value: Nova.config.user.name,
                    panel: null,
                    sortable: false,
                    textAlign: "left"
                },
                {
                    component: "text-field",
                    prefixComponent: true,
                    indexName: "E-mailaddress",
                    name: "E-mailaddress",
                    attribute: "email",
                    value: Nova.config.user.email,
                    panel: null,
                    sortable: false,
                    textAlign: "left"
                }
            ],
            validationErrors: new Errors(),
        }),

        methods: {

            /**
             * Saves the user's profile
             */
            async saveProfile() {
                try {
                    const response = await this.createRequest()


                    this.$toasted.show(
                        this.__('Your profile has been saved!'),
                        { type: 'success' }
                    )

                    this.validationErrors = new Errors()
                } catch (error) {
                    if (error.response.status == 422) {
                        this.validationErrors = new Errors(error.response.data.errors)
                    }
                }
            },

            /**
             * Send a create request to update the user's profile data
             */
            createRequest() {
                return Nova.request().post(
                    '/nova-vendor/runlinenl/nova-profile-tool',
                    this.createResourceFormData()
                )
            },

            /**
             * Create the form data for creating the resource.
             */
            createResourceFormData() {
                return _.tap(new FormData(), formData => {
                    _.each(this.fields, field => {
                        field.fill(formData)
                    })
                })
            },
        },
    }
</script>
