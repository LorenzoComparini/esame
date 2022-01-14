<template>
  <div class="flex p-10 justify-between bg-green-300 sticky top-0 items-center">
      <div>
          <router-link to="/">
              <p class="text-2xl">Banca della terra</p>
          </router-link>
      </div>

      <div>
          <router-link to="/lands/create" class="text-xl">Aggiungi terreno</router-link>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Navbar'
}
</script>

<style>

</style>