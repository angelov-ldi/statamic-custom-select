<template>
    <div>
        <select
                v-if="selectType == 'dynamic-links'"
                :name="name"
                v-model="value"
                @change="onChange($event)">
            <option v-for="link in dynamic_links"
                    :value="link.uid">
                {{ link.title }}
            </option>
        </select>
        <select
            v-if="selectType == 'svg-icons'"
            :name="name"
            v-model="value"
            @change="onChange($event)">
            <option v-for="icon in svg_icons"
                    :value="icon.name">
                {{ icon.name }}
            </option>
        </select>
    </div>
</template>

<script>
    import jsonDataDynamicLinks from '../../../../../../resources/statamic/definitions/dynamic-links.json';
    import jsonSVGIcons from '../../../../../../resources/statamic/definitions/svg-icons.json';

    export default {
        props: {
            value: {
                required: true
            },
            config: {
                type: Object,
                default: () => { return {}; }
            },
            handle: {
                type: String,
                required: true
            },
            meta: {
                type: Object,
                default: () => { return {}; }
            },
            readOnly: {
                type: Boolean,
                default: false
            },
            namePrefix: String,
            errorKeyPrefix: String,
        },

        data() {
            return {
                selectType: this.config.selectType,
                dynamic_links: jsonDataDynamicLinks,
                svg_icons: jsonSVGIcons
            }
        },

        methods: {
            update(value) {
                this.$emit('input', value);
            },

            updateMeta(value) {
                this.$emit('meta-updated', value);
            },

            onChange(event) {
                if (event.target.value) {
                    this.update(event.target.value)
                } else {
                    this.update(null);
                }
            }
        },

        computed: {
            name() {
                if (this.namePrefix) {
                    return `${this.namePrefix}[${this.handle}]`;
                }

                return this.handle;
            },

            isReadOnly() {
                return this.readOnly || this.config.read_only || false;
            },

            replicatorPreview() {
                return this.value;
            },

            fieldId() {
                return 'field_'+this.config.handle;
            }
        }

    }
</script>
<style scoped>
    select{
        border-color: rgba(196.35,204,211.65,var(--border-opacity));
        border-width: 1px;
        border-radius: 3px;
        paddding: 46px 16px!important;
        height: 40px;
        background: rgba(250.15499999999997,251.838,254.74500000000003,var(--bg-opacity));
        width: 100%;
    }
</style>
