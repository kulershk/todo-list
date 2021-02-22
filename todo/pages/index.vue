<template>
  <div class="container">
    <div>
      <Logo />
      <TodoInput />
      <TodoList />
    </div>

  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import TodoInput from "~/components/TodoInput.vue";
import Todolist from "~/components/TodoList.vue";

export default Vue.extend({
  components: {Todolist, TodoInput},
})
</script>

<style>
.container {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
</style>
