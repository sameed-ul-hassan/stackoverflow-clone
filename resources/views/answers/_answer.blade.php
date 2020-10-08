<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
        @include('shared._vote',['model' => $answer])
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea name="" class="form-control" id="" v-model="body" rows="10" required></textarea>
                </div>
                <button class="btn btn-secondary" :disabled="isInvalid">update</button>
                <button type="button" @click="cancel" class="btn btn btn-warning"> Cancel</button>
            </form>
            <div v-else>
                <p v-html="bodyHtml"></p>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            @can('update',$answer)
                            <a @click.prevent="edit" class="btn btn-sm btn-outline-info">
                                edit
                            </a>
                            @endcan
                            @can('delete',$answer)
                            <button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
                            @endcan
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        {{-- @include('shared._author',['model' => $answer,'label' => 'answered']) --}}
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>
</answer>