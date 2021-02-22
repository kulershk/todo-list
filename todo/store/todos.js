export const state = () => ({
  list: []
})

export const mutations = {
  addTodo (state, data) {
    state.list.push({
      text: data.todoText,
      id: data.todoId,
      done: false,
      key: Date.now()+Math.random()*1000
    })
  },

  deleteTodo (state, todoId) {
    state.list = state.list.filter(item => item.id !== todoId)
  },

  updateAllTodo (state, todoList) {

    todoList.forEach(element => {

      state.list.push({
        text: element.text,
        id: element.id,
        done: element.done,
        key: Date.now()+Math.random()*1000
      })

    });
  },

  toggleTodo (state, todo) {
    let found = state.list.find(x => x.id === todo.id);
    found.done = todo.done;
  },

  updateTextTodo (state, todo) {
    let found = state.list.find(x => x.id === todo.id);
    found.text = todo.text;
    found.key = Date.now()+Math.random()*1000;
  }
}
