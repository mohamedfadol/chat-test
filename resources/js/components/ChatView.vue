<template>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card card-defualt">
                <div class="card-title">Messager</div>
                <div class="card-body">
                    <ul class="list-unstyled" style="height: 300px; overflow: scroll;" >
                        <li class="p-2" v-for="(message , index) in messages" :key="index">
                            <strong>{{ message.user.name }}</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>
                <input
                        @keydown="sendTypingEvent"
                        @keyup.enter="sendMessage"
                        v-model="newMessage"
                        type="text"
                        name="message"
                        placeholder="Enter message" class="form-control">
            </div>
            <span class="text-muted" v-if="activeUser"> {{activeUser.name}} is typing...</span>
        </div>
        <div class="col-4">
            <div class="card card-defualt">
                <div class="card-title">Online User</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="p-2" v-for="(user, index) in users" :key="index">
                            {{ user.name}}
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        props:['user'],
      data() {
        return {
            messages: [],
            newMessage: '',
            users: [],
            activeUser: false
        }
      },
      created(){
        this.fetchMessages();

        window.Echo.join('chat')
            .here(user => {
                console.log("user here", user);
                this.users = user;
            })
            .joining(user => {
                console.log("user joining", user);
                this.users.push(user);
            })
            .leaving(user => {
                console.log("user leaving", user);
                this.users = this.users.filter(u => u.id != user.id);
            })
            .listen('.MessageSent', (event) => {
                this.messages.push(event.message);
            })
            .listenForWhisper('typing', user => {
                this.activeUser = user
            });
      },
        methods: {
            fetchMessages(){
                axios.get('api/getMessages').then(response => {
                this.messages = response.data
            });
        },
        sendMessage(){
            this.messages.push({
                user: this.user,
                message: this.newMessage
            });
            axios.post('api/postMessages',{message: this.newMessage});
            this.newMessage = '';
        },
        sendTypingEvent(){
            window.Echo.join('chat')
            .whisper('typing', this.user);
        },
      },
    };
</script>
