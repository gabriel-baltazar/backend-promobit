<template>
  <Header/>
	<router-view></router-view>
	
	
</template>

<script>
	import Header from "./components/Navbar/Header.vue";
	export default {
		components: { Header },
	}

</script>

<style>

</style>