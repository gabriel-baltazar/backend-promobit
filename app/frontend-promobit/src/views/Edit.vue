<template>
  <div class="h-screen bg-gray-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-2/3">
      <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" @submit.prevent>
        <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">
          Edit product {{$route.params.id}}
        </h1>
        <div>
          <input
            class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
            type="text"
            id="name"
            placeholder="Name"
            v-model="formData.name"
          >
          <input
            class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
            type="text"
            id="tagName"
            placeholder="Tag"
            v-model="formData.tagName"
          >
        </div>

        <button
          @click="editProduct()"
          class="
            w-full
            mt-6
            bg-gray-800
            rounded-lg
            px-4
            py-2
            text-lg text-white
            tracking-wide
            font-semibold font-sans
          "
        >
          Save
        </button>
        <button
          @click="deleteProduct()"
          class="
            w-full
            mt-6
            bg-gray-800
            rounded-lg
            px-4
            py-2
            text-lg text-white
            tracking-wide
            font-semibold font-sans
          "
        >
          Delete
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { API_BASE_URL } from '../config'
export default {
  data(){
    return{
      formData:{
        id: parseInt(this.$route.params.id),
        name:'',
        tagName:''
      } 
    }
  },
  methods:{
    editProduct(){
      axios.put(API_BASE_URL + '/edit/product', this.formData)
      .then((response) => console.log('sucesso'))
      .catch((error)=>console.log(error))
      .finally(() => {
        this.$router.push('/products')
      });
    },
    deleteProduct(){
      axios.delete(API_BASE_URL + '/delete/product/' + this.$route.params.id, this.formData['name'])
      .then((response) => console.log('sucesso'))
      .catch((error)=>console.log(error))
      .finally(() => {
        this.$router.push('/products')
      });
    }
  }
}
</script>

<style>

</style>