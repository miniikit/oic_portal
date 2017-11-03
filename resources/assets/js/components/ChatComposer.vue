<template lang="html">
  <div class="chat-composer">
      <input id="message" type="text" placeholder="メッセージを入力" v-model="messageText" v-on:keypress.enter="sendMessage">
      <button class="btn btn-primary" @click="sendMessage">送信</button>
  </div>
</template>

<script>
export default {
    data() {
        return {
            messageText: ''
        }
    },
    methods: {
        sendMessage() {
            this.$emit('messagesent', {
                message: this.messageText,
                user: {
                    name: $('#app .chatname').text()
                }
            });
            this.messageText = '';
        }
    }
}
</script>

<style lang="css">
.chat-composer {
    display: flex;
}
.chat-composer input {
    flex: 1 auto;
    padding: .5rem 1rem;
}
.chat-composer button {
    border-radius: 0;
}
</style>