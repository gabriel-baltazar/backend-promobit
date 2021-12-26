<template>
  <div class="h-screen bg-gray-100 flex justify-center items-center">
    <div class="lg:w-2/5 md:w-1/2 w-2/3">
      <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" @submit.prevent="onSubmit">
        <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">
          New product
        </h1>
        <div v-if="sucess" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Ok!</strong>
          <span class="block sm:inline"> New product added with sucess.</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
          </span>
        </div>
        <div>
          <input
            class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"
            type="text"
            id="name"
            v-model="formData.name"
            placeholder="Name"
          />
        </div>

        <button
          type="submit"
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
          Create
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { API_BASE_URL } from "../config";

export default {
  data(){
    return{
      formData:{
        name: '',
      }
    }
  },
  methods: {
    onSubmit(){
      axios.post(API_BASE_URL + '/create/product', this.formData)
      .then((response) => console.log('sucesso'))
      .catch((error)=>console.log(error))
      .finally(() => {
      });
    },
      
  },
};
</script>

<style>
</style>