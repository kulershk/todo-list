<template>
  <div class="todo-entity">
    <div v-if="!canInteract" class="overlay-not-clickable"></div>
    <div class="todo-entity-check">
      <div class="v-application">
        <v-icon v-if="entity.done" color="success" @click.prevent="toggleTodo">check</v-icon>
        <v-icon v-else color="inactive" @click.prevent="toggleTodo">check</v-icon>
      </div>
    </div>
    <input class="todo-entity-input" v-model="text" @keyup.enter="updateTodo()" type="text" />
    <div class="delete-icon">
      <template v-if="canInteract">
        <v-icon @click="deleteTodo()" color="yellow">delete</v-icon>
      </template>
      <template v-else>
        <v-progress-circular
          :size="20"
          indeterminate
          color="primary"
        ></v-progress-circular>
      </template>
    </div>
  </div>
</template>

<script lang="ts">

import axios from "~/plugins/axios";

export interface TodoInterface {
  id: number;
  text: string;
  done: boolean;
}

export default {
  name: 'TodoEntity',
  props: [ 'entity' ],
  data () {
    return {
      canInteract: true,
      isChecked: false,
      text: ''
    }
  },
  mounted() {
    this.text = this.entity.text;
  },
  methods: {
    deleteTodo(): void {
      this.canInteract = false;
      axios.post("/delete", {id: this.entity.id})
    },
    toggleTodo (): void {
      this.$store.commit('todos/toggleTodo', { id: this.entity.id, done: !this.entity.done})
      axios.post("/toggle", { id: this.entity.id, done: this.entity.done });
    },
    updateTodo (): void {
      this.canInteract = false;
      axios.post("/update", { id: this.entity.id, text: this.text }).then(() => {
        this.canInteract = true;
      })
    }
  }
}
</script>

<style scoped type="text/scss" lang="scss">
  .todo-entity {
    width: 100%;
    max-width:342px;
    height: 32px;
    //background: #3b8070;
    border-left: 1px solid gray;
    border-bottom: 1px solid gray;
    border-right: 1px solid gray;
    position: relative;

    .todo-entity-input {
      width: 100%;
      border: 0;
      height: 31px;
      padding: 0 40px;

      &:focus {
        outline: none;
      }
    }

    .delete-icon {
      position: absolute;
      top: 4px;
      right: 5px;
    }

    .todo-entity-check {
      position: absolute;
      top: 3px;
      left: 5px;
      overflow: hidden;
    }
  }
</style>
