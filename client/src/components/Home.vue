<template>
  <div class="flex flex-col flex-grow p-10">
      <div class="grid grid-cols-4 gap-10">
          <div class="bg-white p-5 rounded shadow-2xl transform hover:-translate-y-2 duration-300 cursor-pointer" v-for="land in lands" :key="land.id" @click="goToDetail(land.id)">
              <div class="flex flex-col space-y-4">
                  
                  <div class="flex items-center justify-between p-2">
                      <p class="text-2xl font-medium">{{ land.city }}</p>
                      <p class="text-2xl font-medium">{{ land.price }} €</p>
                  </div>
                  <div>
                      <img :src="land.img" alt="">
                  </div>
                  <div>
                      <p class="text-lg flex justify-between">Ettari: <span>{{ land.size }}</span></p>
                      <p class="text-lg flex justify-between">Foglio catastale: <span>{{ land.cadastral_sheet }}</span></p>
                      <p class="text-lg flex justify-between">Mappa catastale: <span>{{ land.cadastral_map }}</span></p>
                      <p class="text-lg flex justify-between">Parcella catastale: <span>{{ land.cadastral_parcel }}</span></p>
                      <p class="text-lg flex justify-between">Terreno: <span>{{ land.ground_type }}</span></p>
                      <p class="text-lg flex justify-between">Irrigazione: <span>{{ land.watering_type }}</span></p>
                      <p class="text-lg flex justify-between">Tipo di offerta: <span>{{ land.offer_type }}</span></p>
                  </div>
                  <div class="w-auto">
                      <p v-if="land.available" class="bg-green-300  rounded-full px-3 flex w-min ml-auto">Disponibile</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Home',

    data(){
        return {
            lands: []
        }
    },

    async mounted(){
        this.lands = (await axios.get('http://localhost:8000/api/lands')).data
    },

    methods: {
        goToDetail(id) {
            this.$router.push('/lands/' + id)
        }
    }
}
</script>

<style>

</style>