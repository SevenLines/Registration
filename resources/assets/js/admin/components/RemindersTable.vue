<template>
    <div>
        <div class="form-group">
            <paginator v-if="totalPages > 1" :pagescount="totalPages" :currentPage="currentPage" @setPage="setPage"/>
            <div class="btn btn-info pull-right" @click="addReminder">
                <i class="glyphicon glyphicon-plus"></i>
                Добавить напоминалку
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="table-wrapper">
            <table class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Дата</th>
                    <th>Комментарий</th>
                    <th style="width: 10%;"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="r in reminders">
                    <td>{{r.fio}}</td>
                    <td>{{formatDate(r.remind_date)}}</td>
                    <td>{{r.comment}}</td>
                    <td>
                        <button class="btn btn-default" @click="onEdit(r)"><i class="glyphicon glyphicon-edit"></i></button>
                        <button class="btn btn-danger" @click="onRemove(r.id)"><i class="glyphicon glyphicon-remove"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" ref="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Добавить напоминалку</h4>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group" style="width: 100%">
                                <label>ФИО</label>
                                <input type="text" class="form-control" v-model="currentReminder.fio">
                            </div>
                            <div class="form-group" style="width: 100%">
                                <label>Комментарий</label>
                                <textarea rows="5" style="width: 100%" v-model="currentReminder.comment"></textarea>
                            </div>
                            <label>Дата</label>
                            <div ref="datetimepicker"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="button" class="btn btn-primary" @click="onAdd">Добавить</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
    import axios from 'axios';
    import flatpickr from "flatpickr";
    import moment from 'moment';
    import { Russian } from "flatpickr/dist/l10n/ru.js"

    window.moment = moment;

    export default {
        name: "RemindersTable",
        data() {
            return {
                reminders: [],
                totalPages: 0,
                currentPage: 0,
                currentReminder: {
                    fio: '',
                    remind_date: new Date(),
                    comment: ''
                },
            }
        },
        mounted() {
            let self = this;
            flatpickr(this.$refs.datetimepicker, {
                inline: true,
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                "locale": Russian,
                onChange(selectedDates, dateStr, instance) {
                    self.currentReminder.remind_date = selectedDates[0];
                }
            });
        },
        created() {
            this.load();
        },
        watch: {
            currentPage() {
                this.load();
            }
        },
        methods: {
            load() {
                let self = this;
                axios.get("/api/reminders", {
                    params: {
                        page: this.currentPage - 1
                    }
                }).then(r => {
                    self.reminders = r.data.records;
                    self.reminders.forEach(function (i) {
                        i.remind_date = moment(i.remind_date).add(moment(i.remind_date).utcOffset(), 'm').toDate();
                    });
                    // self.currentPage = r.data.currentPage;
                    self.totalPages = r.data.totalPages;
                })
            },
            formatDate(dt) {
                return moment(dt).format("DD-MM-YYYY HH:mm");
            },
            setPage(page) {
                this.currentPage = page;
            },
            addReminder() {
                this.currentReminder = {
                    fio: '',
                    remind_date: new Date(),
                    comment: ''
                };
                this.$refs.datetimepicker._flatpickr.setDate(this.currentReminder.remind_date);
                $(this.$refs.editModal).modal("show");
            },
            onRemove (id) {
                axios.delete(`/api/reminders/${id}`).then(r => {
                    this.load()
                })
            },
            onEdit(r) {
                this.currentReminder = r;
                this.$refs.datetimepicker._flatpickr.setDate(this.currentReminder.remind_date);
                $(this.$refs.editModal).modal("show");
            },
            onAdd() {
                let dt = moment(this.currentReminder.remind_date);

                let data = {
                    fio: this.currentReminder.fio,
                    remind_date: dt.add(-dt.utcOffset(), 'm').format("Y-MM-D H:m"),
                    comment: this.currentReminder.comment,
                };

                let promise = null;
                if (this.currentReminder.id) {
                    promise = axios.put(`/api/reminders/${this.currentReminder.id}`, data);
                } else {
                    promise = axios.post(`/api/reminders`, data);
                }

                promise.then(r => {
                    $(this.$refs.editModal).modal("hide");
                    this.load();
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "~flatpickr/dist/flatpickr.css";
</style>