<template>
  <div class="p-4">
    <h1 class="text-xl font-bold mb-4">Products</h1>

    <!-- Поиск -->
    <input
        v-model="search"
        @input="fetchProducts"
        placeholder="Search by title..."
        class="border p-2 mb-4 w-full"
    />

    <!-- Таблица -->
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
          <img
              :src="product.image"
              width="100"
              alt="Product Image"
              class="cursor-pointer"
              @click="openPopup(product.image)"
          />
        </td>
      </tr>
      </tbody>
    </table>
  </div>

  <!-- Модалка через Teleport -->
  <teleport to="body">
    <transition name="fade">
      <div
          v-if="popupImage"
          class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[9999]"
          @click.self="closePopup"
      >
        <div class="bg-white p-2 rounded shadow-lg scale-up relative">
          <button
              @click="closePopup"
              class="absolute top-1 right-1 text-black text-lg font-bold"
          >
            ×
          </button>
          <img :src="popupImage" class="max-h-[80vh] max-w-[80vw]" />
        </div>
      </div>
    </transition>
  </teleport>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: [],
      search: '',
      popupImage: null,
    };
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    fetchProducts() {
      axios
          .get('/api/products', { params: { search: this.search } })
          .then(res => (this.products = res.data))
          .catch(err => console.error(err));
    },
    openPopup(url) {
      this.popupImage = url;
    },
    closePopup() {
      this.popupImage = null;
    },
  },
};
</script>

<style scoped>
input {
  margin-bottom: 1rem;
}
.cursor-pointer {
  cursor: pointer;
}

/* Плавное появление модалки */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Появление контейнера */
.scale-up {
  animation: scaleUp 0.3s ease;
}
@keyframes scaleUp {
  0% {
    transform: scale(0.8);
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}
</style>
