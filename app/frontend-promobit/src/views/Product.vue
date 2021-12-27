<template>
  <div class="flex flex-wrap space-x-4 justify-center">
      <h2>Product</h2>
      <p>Codigo:{{product.id}}</p>
      <p>Name: {{product.name}}</p>
  </div>
</template>

<script>
import axios from "axios";
import { API_BASE_URL } from "../config";

export default {
  components: {},
  data() {
    return {
      product: [],
    };
  },
  mounted() {
    this.getProduct();
  },
  methods: {
    async getProduct() {
      const response = await axios.get(
        API_BASE_URL + '/list/product/' + this.$route.params.id
      );
      if (response.status == 200) {
        this.product = response.data;
      } else {
        console.log("Api error");
      }
    },
  },
};
</script>

<style>
</style>