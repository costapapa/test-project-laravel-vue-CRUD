<template>
    <div class="addCourse">
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
        <button class="btn" @click="addCourse">Add Course</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            courses: {
                course_name: "",
                description: "",
                instructor: "",
                duration: "",
                start_date: "",
            },
            courseList: [],
        };
    },
    methods: {
        addCourse() {
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

            // Send a POST request to the API to add the course
            axios
                .post("api/course/store", {
                    courses: this.courses,
                })
                .then((response) => {
                    if (response.status === 201) {
                        // Reset the course object after a successful submission
                        this.courses.course_name = "";
                        this.courses.description = "";
                        this.courses.instructor = "";
                        this.courses.duration = "";
                        this.courses.start_date = "";
                        this.courseList.push(this.courses);
                        console.log(this.courses);
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>

<style scoped>
.btn {
    border: solid 1px;
}
</style>
