<template>
    <div class="flex flex-col flex-grow p-10 items-center justify-center">
        <div class="bg-white px-10 pb-10 w-1/3 rounded">
            <div>
                <p class="text-2xl font-semibold py-10">{{ title }}</p>
            </div>
            <div class="flex flex-col space-y-3">
                <div class="" v-for="field in landFields" :key="field.name">
                    <div class="flex flex-col space-y-2" v-if="field.type == 'text'">
                        <label :for="field.name" class="font-medium">{{ field.label }}</label>
                        <input :id="field.name" type="text" v-model="land[field.field]" class="border-2 border-gray-200 rounded-md px-2 outline-none py-1">
                    </div>

                    <div class="flex flex-col space-y-2" v-if="field.type == 'textarea'">
                        <label :for="field.name" class="font-medium">{{ field.label }}</label>
                        <textarea cols="30" rows="5" :id="field.name" type="text" v-model="land[field.field]" class="border-2 border-gray-200 rounded-md px-2 outline-none py-1"></textarea>
                    </div>

                    <div class="flex flex-col space-y-2" v-if="field.type == 'select'">
                        <label :for="field.name" class="font-medium">{{ field.label }}</label>
                        <select :id="field.name" v-model="land[field.field]" class="border-2 border-gray-200 bg-white rounded-md px-2 outline-none py-1">
                            <option v-for="option in field.options" :key="option.code" :value="option.value"> {{ option.value }}</option>
                        </select>
                    </div>

                    <div class="flex flex-col space-y-2" v-if="field.type == 'number'">
                        <label :for="field.name" class="font-medium">{{ field.label }}</label>
                        <input :id="field.name" type="number" v-model="land[field.field]" class="border-2 border-gray-200 rounded-md px-2 outline-none py-1">
                    </div>

                    <div class="flex space-x-4 items-center" v-if="field.type == 'boolean'">
                        <label :for="field.name" class="font-medium">{{ field.label }}</label>
                        <input type="checkbox" v-model="land[field.field]">
                    </div>
                    
                </div>
            </div>

            <div class="flex justify-end mt-7">
                <button class="bg-green-300 px-3 py-1 rounded text-white text-xl" @click="create()">
                    {{ confirmText }}
                </button>
            </div>
        </div>
    </div>
        
</template>

<script>
import axios from 'axios'

export default {
    name: 'Create',

    data(){
        return {
            title: "Aggiungi terreno",
            confirmText: 'Crea',
            isEdit: false,
            land: {
                available: false
            },
            landFields: [
                {
                    name: 'city',
                    type: 'text',
                    label: 'Comune',
                    field: 'city'
                },
                {
                    name: 'desc',
                    type: 'textarea',
                    label: 'Descrizione',
                    field: 'description'
                },
                {
                    name: 'image',
                    type: 'text',
                    label: 'Immagine',
                    field: 'img'
                },
                {
                    name: 'size',
                    type: 'number',
                    label: 'Dimensione in ettari',
                    field: 'size'
                },
                {
                    name: 'sheet',
                    type: 'text',
                    label: 'Foglio catastale',
                    field: 'cadastral_sheet'
                },
                {
                    name: 'map',
                    type: 'text',
                    label: 'Mappa catastale',
                    field: 'cadastral_map'
                },
                {
                    name: 'parcel',
                    type: 'text',
                    label: 'Parcella catastale',
                    field: 'cadastral_parcel'
                },
                {
                    name: 'ground',
                    type: 'select',
                    options: [
                        {
                            code: '',
                            value: 'Argilloso'
                        },
                        {
                            code: '',
                            value: 'Sabbioso'
                        },
                        {
                            code: '',
                            value: 'Ghiaioso'
                        },
                        {
                            code: '',
                            value: 'Tufo'
                        },
                    ],
                    label: 'Tipo di terreno',
                    field: 'ground_type'
                },
                {
                    name: 'water',
                    type: 'select',
                    options: [
                        {
                            code: '',
                            value: 'A scorrimento'
                        },
                        {
                            code: '',
                            value: 'Pozzo'
                        },
                        {
                            code: '',
                            value: 'Canale'
                        },
                        {
                            code: '',
                            value: "Senz'acqua"
                        },
                    ],
                    label: 'Tipo di irrigazione',
                    field: 'watering_type'
                },
                {
                    name: 'offer',
                    type: 'select',
                    options: [
                        {
                            code: '',
                            value: 'Vendita'
                        },
                        {
                            code: '',
                            value: 'Affitto'
                        },
                        {
                            code: '',
                            value: 'Affido gratuito'
                        },
                    ],
                    label: 'Tipo di offerta',
                    field: 'offer_type'
                },
                {
                    name: 'price',
                    type: 'number',
                    label: 'Canone offerta',
                    field: 'price'
                },
                {
                    name: 'availablity',
                    type: 'boolean',
                    label: 'Disponibile da subito',
                    field: 'available'
                },

            ]
        }
    },

    async mounted() {
        console.log(this.$route.params.id);
        if (this.$route.params.id) { this.isEdit = true; } 

        if (this.isEdit) { 
            this.title = "Modifica terreno",
            this.confirmText = "Aggiorna",
            this.land = (await axios.get('http://localhost:8000/api/lands/' + this.$route.params.id)).data
        }   
    },

    methods : {
        async create(){
            if (!this.isEdit) {
                this.response = await axios.post('http://localhost:8000/api/lands', this.land)
                this.$router.push('/')
            } else {
                this.response = await axios.post('http://localhost:8000/api/lands/' + this.$route.params.id, this.land)
                this.$router.push('/')
            }
        }
    }
}
</script>

<style>

</style>