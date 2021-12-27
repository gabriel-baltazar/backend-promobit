<template>
  <div
    class="flex p-5 mt-8 space-x-4 items-center shadow-xl max-w-sm rounded-md"
    v-for="product in products"
    :key="product.id"
  >
    <img
      src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
      alt="image"
      class="h-14 w-14 rounded-full"
    />
    <div>
      <h2 class="text-gray-800 font-semibold text-xl">{{ product.name }}</h2>
      <input hidden type="text" id="idProduct" :value="product.id" />
      <router-link :to="{ name: 'Product', params: { id:product.id}}">
        <p class="mt-1 text-gray-400 text-sm cursor-pointer">View</p>
      </router-link>
    </div>
    <div>
			<router-link :to="{ name: 'Edit', params: { id:product.id, name:product.name }}">
				<button aria-label="Edit" class=" p-1
						focus:outline-none focus:shadow-outline
						text-teal-500
						hover:text-teal-600">
					Edit
				</button>
			</router-link>
      
    </div>
  </div>
</template>

<script>
import Edit from '../../views/Edit.vue'
import Product from '../../views/Product.vue'
export default {
	
	components:{
		Edit, Product
	},
  props: {
    products: Array,
  }
};
</script>

<style>
</style>