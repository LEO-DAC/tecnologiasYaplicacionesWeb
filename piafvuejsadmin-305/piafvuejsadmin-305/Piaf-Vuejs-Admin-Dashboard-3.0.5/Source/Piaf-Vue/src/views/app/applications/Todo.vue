<template>
  <div class="disable-text-selection">
    <b-row class="app-row survey-app" >
      <b-colxx xxs="12">
        <div class="mb-2">
          <h1>{{ $t('menu.todo') }}</h1>
          <div class="float-sm-right">
            <b-button v-b-modal.modalright variant="primary" size="lg" class="top-right-button">{{ $t('todo.add-new') }}</b-button>
            <b-button-group v-if="isLoad">
              <b-dropdown  split right @click="selectAll(true)" class="check-button" variant="primary">
                  <label class="custom-control custom-checkbox pl-4 mb-0 d-inline-block" slot="button-content">
                    <input class="custom-control-input" type="checkbox"
                    :checked="isSelectedAll()"
                    v-shortkey="{select: ['ctrl','a'], undo: ['ctrl','d']}" @shortkey="keymap"
                    />
                    <span :class="{
                      'custom-control-label' :true,
                      'indeterminate' : isAnyItemSelected()
                    }"/>
                  </label>
                <b-dropdown-item>{{$t('todo.action')}}</b-dropdown-item>
                <b-dropdown-item>{{$t('todo.another-action')}}</b-dropdown-item>
              </b-dropdown>
            </b-button-group>
            <b-modal id="modalright" ref="modalright" :title="$t('todo.add-new-title')" class="modal-right">
                <b-form>
                  <b-form-group :label="$t('todo.title')">
                    <b-form-input v-model="newItem.title"  />
                  </b-form-group>
                  <b-form-group  :label="$t('todo.detail')">
                    <b-textarea  v-model="newItem.detail"  :rows="2" :max-rows="2"/>
                  </b-form-group>
                  <b-form-group :label="$t('todo.category')">
                      <v-select  :options="categories" v-model="newItem.category"/>
                  </b-form-group>
                  <b-form-group :label="$t('todo.label')">
                      <v-select  :options="labels" v-model="newItem.label"/>
                  </b-form-group>
                  <b-form-group :label="$t('todo.status')">
                    <b-form-radio-group stacked class="pt-2" :options="statuses" v-model="newItem.status" />
                  </b-form-group>
                </b-form>

                  <template slot="modal-footer">
                    <b-button variant="outline-secondary" @click="hideModal('modalright')">{{ $t('todo.cancel') }}</b-button>
                    <b-button variant="primary" @click="addNewItem()" class="mr-1">{{ $t('todo.submit') }}</b-button>
                  </template>
              </b-modal>

          </div>
          <piaf-breadcrumb/>
        </div>
        <div class="mb-2">
          <b-button variant="empty" class="pt-0 pl-0 d-inline-block d-md-none" v-b-toggle.displayOptions>
            {{ $t('todo.display-options') }} <i class="simple-icon-arrow-down align-middle" />
          </b-button>
          <b-collapse id="displayOptions" class="d-md-block">
            <div class="d-block d-md-inline-block mb-2">
              <b-dropdown id="ddown1" :text="`${$t('todo.orderby')} ${sort.label}`" variant="outline-dark" class="mr-1 float-md-left btn-group " size="xs">
                  <b-dropdown-item v-for="(order,index) in sortOptions" :key="`order${index}`" @click="changeOrderBy(order)" >{{ order.label }}</b-dropdown-item>
              </b-dropdown>
              <div class="search-sm d-inline-block float-md-left mr-1 align-top">
                <b-input :placeholder="$t('menu.search')" v-model="search"/>
              </div>
            </div>
          </b-collapse>
        </div>
        <div class="separator mb-5"/>

        <b-row v-if="isLoad" key="itemList">
            <b-colxx xxs="12" v-for="(item,index) in items" :key="`item${index}`">
              <todo-list-item
                  :key="item.id"
                  :data="item"
                  :selected-items="selectedItems"
                  @toggle-item="toggleItem"
                  v-contextmenu:contextmenu
                />
            </b-colxx>
        </b-row>
        <div v-else class="loading" key="itemLoading"></div>
      </b-colxx>
    </b-row>
    <v-contextmenu ref="contextmenu" @contextmenu="handleContextmenu">
      <v-contextmenu-item @click="onContextCopy()"><i class="simple-icon-docs" /> <span>Copy</span></v-contextmenu-item>
      <v-contextmenu-item @click="onContextArchive()"><i class="simple-icon-drawer" /> <span>Move to archive</span></v-contextmenu-item>
      <v-contextmenu-item @click="onContextDelete()"><i class="simple-icon-trash" /> <span>Delete</span></v-contextmenu-item>
    </v-contextmenu>

    <application-menu>
      <vue-perfect-scrollbar :settings="{ suppressScrollX: true, wheelPropagation: false }"  >
        <div class="p-4" >
          <p class="text-muted text-small mb-3">{{$t('todo.status')}}</p>
          <ul class="list-unstyled mb-4">
            <li class="nav-item"><a href="#" >
                 <i class="simple-icon-reload" />{{$t('todo.all-tasks')}} <span class="float-right" v-if="isLoad">{{items.length}}</span>
              </a></li>
            <li class="nav-item"><a href="#" >
                 <i class="simple-icon-refresh" />{{$t('todo.pending-tasks')}} <span class="float-right" v-if="isLoad">{{items.filter(x => x.status === "PENDING").length}}</span>
              </a></li>
            <li class="nav-item"><a href="#" >
                 <i class="simple-icon-check" />{{$t('todo.completed-tasks')}} <span class="float-right" v-if="isLoad">{{items.filter(x => x.status === "COMPLETED").length}}</span>
              </a></li>
          </ul>
            <p class="text-muted text-small mb-1">{{$t('todo.categories')}}</p>
            <ul class="list-unstyled mb-4">
              <b-form-radio-group stacked class="pt-2" :options="categories.map((c)=> {return {text:c.label,value:c.value}})"  />
            </ul>
             <p class="text-muted text-small mb-3">{{$t('todo.labels')}}</p>
            <div>
              <p class="d-sm-inline-block mb-1" v-for="(l,index) in labels" :key="index">
                <a href="#">
                  <b-badge pill :variant="`outline-${l.color}`" class="mb-1 mr-1">{{l.label}}</b-badge>
                </a>
              </p>
            </div>
        </div>

      </vue-perfect-scrollbar>
    </application-menu>
  </div>
</template>
<script>
import { mapGetters, mapMutations, mapActions } from 'vuex'

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'
import TodoListItem from '@/components/TodoApp/TodoListItem'
import ApplicationMenu from '@/components/Common/ApplicationMenu'

export default {
  components: {
    vSelect,
    TodoListItem,
    ApplicationMenu
  },
  data () {
    return {
      sort: { column: 'title', label: 'Title' },
      sortOptions: [
        { column: 'title', label: 'Title' },
        { column: 'category', label: 'Category' },
        { column: 'label', label: 'Label' },
        { column: 'status', label: 'Status' }
      ],
      search: '',
      selectedItems: [],
      categories: [
        { label: 'Flexbox', value: 'Flexbox' },
        { label: 'Sass', value: 'Sass' },
        { label: 'Vue', value: 'Vue' },
        { label: 'React', value: 'React' }
      ],
      labels: [
        { label: 'EDUCATION', value: 'EDUCATION', color: 'secondary' },
        { label: 'NEW FRAMEWORK', value: 'NEW FRAMEWORK', color: 'primary' },
        { label: 'PERSONAL', value: 'PERSONAL', color: 'info' }
      ],
      statuses: [
        { text: 'PENDING', value: 'PENDING' },
        { text: 'COMPLETED', value: 'COMPLETED' }
      ],
      newItem: {
        title: '',
        category: '',
        detail: '',
        label: '',
        status: ''
      }

    }
  },
  computed: {
    ...mapGetters(['isLoad', 'items', 'todoError'])
  },
  methods: {
    ...mapActions(['getTodoItems']),
    ...mapMutations(['addTodoItem']),
    isSelectedAll () {
      return this.selectedItems.length >= this.items.length
    },
    isAnyItemSelected () {
      return this.selectedItems.length > 0 && this.selectedItems.length < this.items.length
    },
    hideModal (refname) {
      this.$refs[refname].hide()
    },
    changeOrderBy (sort) {
      this.sort = sort
    },
    addNewItem () {
      const date = new Date()
      this.addTodoItem({ title: this.newItem.title,
        detail: this.newItem.detail,
        category: this.newItem.category.value,
        label: this.newItem.label.value,
        status: this.newItem.status,
        date: date.getDay() + '.' + date.getMonth() + 1 + '.' + date.getFullYear(),
        labelColor: this.newItem.label.color
      })
      this.newItem = { title: '', category: '', detail: '', label: '', status: '' }
      this.hideModal('modalright')
    },
    selectAll (isToggle) {
      if (this.selectedItems.length >= this.items.length) {
        if (isToggle) { this.selectedItems = [] }
      } else {
        this.selectedItems = this.items.map(x => x.id)
      }
    },
    keymap (event) {
      switch (event.srcKey) {
        case 'select':
          this.selectAll(false)
          break
        case 'undo':
          this.selectedItems = []
          break
      }
    },
    getIndex (value, arr, prop) {
      for (var i = 0; i < arr.length; i++) {
        if (arr[i][prop] === value) {
          return i
        }
      }
      return -1
    },
    toggleItem (event, itemId) {
      if (event.shiftKey && this.selectedItems.length > 0) {
        let itemsForToggle = this.items
        var start = this.getIndex(itemId, itemsForToggle, 'id')
        var end = this.getIndex(this.selectedItems[this.selectedItems.length - 1], itemsForToggle, 'id')
        itemsForToggle = itemsForToggle.slice(Math.min(start, end), Math.max(start, end) + 1)
        this.selectedItems.push(
          ...itemsForToggle.map(item => {
            return item.id
          })
        )
      } else {
        if (this.selectedItems.includes(itemId)) {
          this.selectedItems = this.selectedItems.filter(x => x !== itemId)
        } else { this.selectedItems.push(itemId) }
      }
    },
    handleContextmenu (vnode) {
      if (!this.selectedItems.includes(vnode.key)) {
        this.selectedItems = [vnode.key]
      }
    },
    onContextCopy () {
      console.log('context menu item clicked - Copy Items: ', this.selectedItems)
    },
    onContextArchive () {
      console.log('context menu item clicked - Move to Archive Items: ', this.selectedItems)
    },
    onContextDelete () {
      console.log('context menu item clicked - Delete Items: ', this.selectedItems)
    }
  },
  mounted () {
    this.getTodoItems()
  }
}
</script>
