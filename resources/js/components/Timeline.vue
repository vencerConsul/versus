<template>
    <div class="modal-add-post">
        <div
            class="card border"
            id="timeline-details"
            v-for="item in allPosts"
            :key="item.id"
        >
            <img
                class="card-img-top"
                :src="'/team_photo/' + item.team_photo"
                :alt="item.team_photo"
            />
            <div class="card-body">
                <pre>{{ item.game_type }}</pre>
                <h5>{{ item.team_name }}</h5>
                <p class="card-text">
                    {{ item.caption }}
                </p>
                <div class="heart float-left">
                    <i class="fa fa-heart" onclick="heart(this)"></i>
                    <small id="heartcount" class="border-right p-2">2</small>
                    <small> 1 hour ago</small>
                </div>
                <button class="btn m-0 btn-sm" v-if="!userAuth">Interested</button>
                <button class="btn m-0 btn-sm" v-if="userAuth">Delete post</button>
            </div>
        </div>

        <div class="modal-overlay" :class="{ modalActive: modal }">
            <div class="modal-content" :class="{ modalDisabled: preload }">
                <h5 class="text-center">Make post</h5>
                <i class="fa fa-times" @click="showModal"></i>
                <form
                    @submit.prevent="addpost"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    <input
                        class="d-none"
                        type="file"
                        id="upload"
                        @change="onfileChange"
                    />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea
                                    class="form-control"
                                    rows="3"
                                    v-model="caption"
                                    :class="{ invalid: validations.caption }"
                                    placeholder="write something...."
                                ></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select
                                    v-model="game_type"
                                    :class="{ invalid: validations.game_type }"
                                    class="form-control rounded-0"
                                >
                                    <option value="">Choose game</option>
                                    <option value="Mobile Legends"
                                        >Mobile Legends</option
                                    >
                                    <option value="League of Legends"
                                        >League of Legends</option
                                    >
                                    <option value="Arena of Valor"
                                        >Arena of Valor</option
                                    >
                                    <option value="Dota 2">Dota 2</option>
                                    <option value="Vain Glory"
                                        >Vain Glory</option
                                    >
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    placeholder="Team name"
                                    class="form-control rounded-0"
                                    v-model="team_name"
                                    :class="{ invalid: validations.team_name }"
                                />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div v-if="imagepreview">
                                <img
                                    class="img-fluid team-photo"
                                    :src="imagepreview"
                                    alt=""
                                />
                                <button @click="removeImg" class="btn btn-sm">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <span
                            class="btn ml-0 border"
                            onclick="document.getElementById('upload').click()"
                        >
                            <i class="fa fa-image p-1 d-none d-lg-inline"></i>
                            team photo
                        </span>
                        <button class="btn btn-sm" :disabled="disabled">
                            <span v-if="!preload">Post</span>
                            <div
                                class="spinner-border"
                                role="status"
                                v-if="preload"
                            ></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="floating-button" @click="showModal">
            <i class="fa fa-edit"></i>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            caption: "",
            game_type: "",
            team_name: "",
            team_photo: "",
            validations: "",
            imagepreview: null,
            modal: false,
            disabled: true,
            allPosts: [],
            preload: false,
            userAuth: []
        };
    },
    methods: {
        async getUserAuth() {
            await axios.get("getuser").then(response => {
                console.log(response.data.id);
            });
        },
        onfileChange(event) {
            this.team_photo = event.target.files[0];
            this.disabled = false;

            let reader = new FileReader();
            reader.readAsDataURL(this.team_photo);
            reader.onload = event => {
                this.imagepreview = event.target.result;
            };
        },
        removeImg() {
            this.imagepreview = "";
            this.team_photo = "";
            this.disabled = true;
        },
        showModal() {
            this.modal = !this.modal;
        },
        async showPosts() {
            await axios.get("showPosts").then(response => {
                if (response.status === 200) {
                    this.allPosts = response.data;
                }
            });
        },
        async addpost() {
            this.preload = true;
            let formData = new FormData();
            formData.append("caption", this.caption);
            formData.append("game_type", this.game_type);
            formData.append("team_name", this.team_name);
            formData.append("team_photo", this.team_photo);

            await axios
                .post("addPosts", formData)
                .then(response => {
                    if (response.status === 200) {
                        this.preload = false;
                        this.caption = "";
                        this.game_type = "";
                        this.team_name = "";
                        this.team_photo = "";
                        this.imagepreview = "";
                        this.validations = "";
                        this.disabled = true;
                        this.showPosts();
                        this.showModal();
                        Swal.fire({
                            position: "top-end",
                            text: "Posted",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.preload = false;
                        this.validations = error.response.data.errors;
                    }
                });
        }
    },
    mounted() {
        this.showPosts();
        this.getUserAuth();
    }
};
</script>

<style lang="scss" scoped>
.floating-button {
    position: fixed;
    right: 1em;
    bottom: 1em;
    height: 50px;
    width: 50px;
    cursor: pointer;
    background: var(--primary);
    color: #ffffff;
    padding: 5px 10px;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}
.invalid {
    border: 1px solid red;
    background: url("/images/icons/invalid.svg") no-repeat;
    padding-right: calc(1.5em + 0.75rem);
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}
.modal-overlay {
    background-color: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0.5s opacity 1s;
}

.modalActive {
    visibility: visible;
    opacity: 1;
}

.modalDisabled::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    background: #05050543;
    height: 100%;
    width: 100%;
    z-index: 9999;
}
.modal-content {
    width: 50%;
    padding: 20px 50px;

    i {
        position: absolute;
        top: 1em;
        right: 1em;
        cursor: pointer;
    }

    .team-photo {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }

    button,
    span {
        box-shadow: none;
    }
    button {
        background: #f64c41;
        color: #ffffff;
    }
}
@media screen and (max-width: 575px) {
    .modal-content {
        width: 90%;
        padding: 10px 20px;

        i {
            position: absolute;
            top: 1em;
            right: 1em;
            cursor: pointer;
        }

        .team-photo {
            height: 100px;
            width: 100px;
            object-fit: cover;
        }

        button,
        span {
            box-shadow: none;
            padding: 5px 15px;
        }
    }
}
</style>
