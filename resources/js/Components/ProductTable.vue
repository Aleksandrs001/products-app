<template>
  <div class="p-4">
    <h1 class="text-xl font-bold mb-4">Products</h1>

    <input
        v-model="search"
        @input="fetchProducts"
        placeholder="Search by title..."
        class="border p-2 mb-4 w-full"
    />

    <table border="1" cellpadding="5" cellspacing="0" class="w-full">
      <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="product in products" :key="product.id">
        <td>{{ product.title }}</td>
        <td>{{ product.description }}</td>
        <td>
          <img :src="product.image" width="100" alt="Product Image" />
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: [],
      search: ''
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    fetchProducts() {
      axios
          .get('/api/products', { params: { search: this.search } })
          .then((res) => {
            this.products = res.data;
          })
          .catch((err) => {
            console.error(err);
          });
    }
  }
};
</script>

<style scoped>
input {
  margin-bottom: 1rem;
}
</style>
