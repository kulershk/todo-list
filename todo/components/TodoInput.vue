<template>
  <div class="todo">
    <div v-if="!canInteract" class="overlay-not-clickable"></div>
    <input v-model="entity" @keyup.enter="addTodo" class="entity" type="text" />
    <div class="add-icon">
      <v-icon v-if="entity" @click="addTodo" color="yellow">add_circle</v-icon>
    </div>
  </div>
</template>

<script lang="ts">
import {pusherChannel} from "~/plugins/pusher";
import axios from "~/plugins/axios";

export default {
  name: 'TodoInput',
  data() {
    return {
      canInteract: true,
      entity: 'test',
    }
  },
  created() {
    pusherChannel.bind('addTodo', (data) => {
      this.$store.commit('todos/addTodo', data);
    });
  },
  destroyed() {
    pusherChannel.unbind('todos/addTodo');
  },
  methods: {
    addTodo (): void {
      if (!this.canInteract) return

      this.canInteract = false;
      axios.post('/create', {
        text: this.entity,
      })
      .then((response) => {
        this.canInteract = true;
        this.entity = '';
      })
    }
  }
}
</script>

<style scoped lang="scss">
  .todo {
    width: 100%;
    max-width:342px;
    height: 44px;
    border: 1px solid #6e6e6e;
    overflow: hidden;
    position: relative;

    .entity {
      width: 100%;
      border: 0;
      height: 44px;
      padding: 0 40px;

      &:focus {
        outline: none;
      }
    }

    .add-icon {
      position: absolute;
      top: 9px;
      right: 5px;
    }
  }
</style>
