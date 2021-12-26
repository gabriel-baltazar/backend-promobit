<template>
  <div class="flex flex-wrap space-x-4 justify-center">
    <button
      class="
        bg-gray-600
        hover:bg-gray-800
        text-white
        font-bold
        py-2
        px-4
        border-b-2 border-gray-800
        hover:border-gray-800
        rounded
      "
    >
      <router-link to="/new-product">New</router-link>
    </button>
  </div>
  <div class="flex flex-wrap space-x-4 justify-center">
    <Card :products="products" />
  </div>
</template>

<script>
import axios from "axios";
import Header from "../components/Navbar/Header.vue";
import Card from "../components/Card/Card.vue";
import { API_BASE_URL } from "../config";

export default {
  components: { Header, Card },
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      const response = await axios.get(
        API_BASE_URL + '/list/products'
      );
      if (response.status == 200) {
        this.products = response.data;
      } else {
        console.log("Api error");
      }
    },
  },
};
</script>

<style>
</style>