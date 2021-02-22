<template>
  <div class="todo-list">
      <TodoEntity v-for="todo in todos" v-bind:entity='todo' v-bind:key="todo.key" />
  </div>
</template>

<script lang="ts">
import TodoEntity, {TodoInterface} from "~/components/TodoEntity.vue";
import axios from "~/plugins/axios";
import {pusherChannel} from "~/plugins/pusher";

export default {

  computed: {
    todos (): Array<TodoInterface> {
       return this.$store.state.todos.list
    }
  },
  name: 'TodoList',
  components: { TodoEntity },
  created() {
    pusherChannel.bind('deleteTodo', (data) => {
      this.$store.commit('todos/deleteTodo', data.todoId);
    });

    pusherChannel.bind('statusTodo', (data) => {
      this.$store.commit('todos/toggleTodo', data);
    });

    pusherChannel.bind('textTodo', (data) => {
      this.$store.commit('todos/updateTextTodo', data);
    });

    axios.post("/list").then((response) => {
      this.$store.commit('todos/updateAllTodo', response.data.list);
    });
  }

}
</script>

<style scoped lang="scss">
  .todo-list {
    width:342px;
    height: 32px;
  }
</style>
