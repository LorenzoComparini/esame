<template>
    <div class="flex flex-col flex-grow p-10">
        <div class="w-full max-h-full bg-white rounded p-10 space-y-5">
            <div class="flex justify-between">
                <p class="text-3xl">{{ land.city }}</p>
                <div>
                    <p class="bg-green-300 px-4 py-1 rounded-full" v-if="land.available">Disponbile subito</p>
                </div>
            </div>

            <div class="flex text-2xl items-center">
                <p>Canone di offerta: <span class="text-green-300">{{ land.price }} € </span></p>
            </div>

            <div class="flex space-x-10">
                <img :src="land.img" alt="" class="w-1/3">
                <div class="w-1/3 text-lg text-justify">{{ land.description }}</div>
            </div>

            <div class="flex text-xl space-x-10">
                <div class="flex flex-col">
                    <p class="font-semibold py-1">Dati terreno</p>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Ettari: </p>
                        <p>{{ land.size }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Tipologia di terreno: </p>
                        <p>{{ land.ground_type }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Tipologia di irrigazione: </p>
                        <p>{{ land.watering_type }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Tipologia di offerta: </p> 
                        <p>{{ land.offer_type }}</p>
                    </div>
                </div>

                <div class="flex flex-col">
                    <p class="font-semibold py-1">Dati catasto</p>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Foglio catastale: </p>
                        <p>{{ land.cadastral_sheet }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Mappa catastale: </p>
                        <p>{{ land.cadastral_map }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <p class="">Parcella catastale: </p>
                        <p>{{ land.cadastral_parcel }}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <div class="flex justify-end space-x-2">
                      <div class="w-10 h-10 flex justify-center text-yellow-300 items-center rounded-full border-2 border-yellow-300 cursor-pointer hover:bg-yellow-300 hover:text-white transform duration-300" @click="edit()">
                          <span class="material-icons text-2xl">
                            mode_edit_outline
                          </span>
                      </div>
                      <div class="w-10 h-10 flex justify-center text-red-400 items-center rounded-full border-2 border-red-400 cursor-pointer hover:bg-red-400 hover:text-white transform duration-300" @click="remove()">
                          <span class="material-icons text-2xl ">
                            delete_outline
                          </span>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Detail',

    data() {
        return {
            land: {}
        }
    },

    async mounted(){
        this.land = (await axios.get('http://localhost:8000/api/lands/' + this.$route.params.id)).data
    },

    methods: {
        async remove() {
            this.response = await axios.delete('http://localhost:8000/api/lands/' + this.$route.params.id)
            this.$router.push('/')

        },

        edit() {
            this.$router.push('/lands/edit/' + this.$route.params.id)
        }
    }
}
</script>

<style>

</style>