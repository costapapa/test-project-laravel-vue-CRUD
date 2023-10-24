<template>
    <div class="editCourse">
        <input
            type="text"
            v-model="courses.course_name"
            placeholder="Course Name"
        />
        <input
            type="text"
            v-model="courses.description"
            placeholder="Description"
        />
        <input
            type="text"
            v-model="courses.instructor"
            placeholder="Instructor"
        />
        <input type="text" v-model="courses.duration" placeholder="Duration" />
        <input
            type="date"
            v-model="courses.start_date"
            placeholder="Start Date"
        />
        <hr />
        <button @click="updateCourse">Update Course</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ["id"], // Receive the course id as a prop

    data() {
        return {
            courses: {
                id: null,
                course_name: "",
                description: "",
                instructor: "",
                duration: "",
                start_date: "",
            },
        };
    },

    async created() {
        if (this.id) {
            // Fetch the course information based on the provided id
            const response = await axios.get(`api/course/${this.id}`);
            this.courses = response.data;
        }
    },

    methods: {
        updateCourse() {
            // Validate the course object
            if (
                !this.courses.course_name ||
                !this.courses.description ||
                !this.courses.instructor ||
                !this.courses.duration ||
                !this.courses.start_date
            ) {
                console.log("Please fill out all fields.");
                return;
            }

            // Send a PUT request to the API to update the course
            axios
                .put("api/course/" + this.courses.id, {
                    courses: this.courses,
                })
                .then((response) => {
                    if (response.status === 200) {
                        // Reset the course object after a successful submission
                        this.courses.course_name = "";
                        this.courses.description = "";
                        this.courses.instructor = "";
                        this.courses.duration = "";
                        this.courses.start_date = "";
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
