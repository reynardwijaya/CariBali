<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">

body {
  font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.manage_page_content {
  background-color: #f9fafb;
  min-height: calc(100vh - 140px);
  padding: 40px;
  width: 100%;
}

.manage_header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
  flex-wrap: wrap;
  gap: 16px;
}

.manage_header h1 {
  font-size: 22px;
  font-weight: 700;
  color: #111827;
  margin: 0;
}

.manage_header p {
  color: #9ca3af;
  font-size: 13px;
  margin: 4px 0 0;
}

.btn-add-new {
  background-color: #f97316;
  color: #ffffff;
  padding: 11px 22px;
  border-radius: 10px;
  font-weight: 600;
  font-size: 14px;
  border: none;
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: background-color 0.2s ease;
}

.btn-add-new:hover {
  background-color: #ea580c;
  color: #ffffff;
  text-decoration: none;
}

/* Container styling */
.table_deg_wrapper {
  background-color: #ffffff;
  border-radius: 16px;
  border: 1px solid #f1f1f1;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
  overflow: hidden;
  overflow-x: auto;
}

.table_deg {
  width: 100%;
  border-collapse: collapse;
}

/* Header styling */
.table_deg thead {
  background: #fafafa;
}

.table_deg th {
  padding: 14px 16px;
  color: #6b7280;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  text-align: center;
  border-bottom: 1px solid #f1f1f1;
  white-space: nowrap;
}

/* Row styling */
.table_deg td {
  padding: 14px 16px;
  font-size: 14px;
  color: #374151;
  border-bottom: 1px solid #f5f5f5;
  vertical-align: middle;
  text-align: center;
}

.table_deg tr:last-child td {
  border-bottom: none;
}

.table_deg tbody tr:hover {
  background-color: #fff7ed;
  transition: background-color 0.2s ease;
}

/* Image style */
.img_deg {
  width: 120px;
  height: 80px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.tag_pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  background: #f3f4f6;
  color: #374151;
  font-size: 12px;
  font-weight: 500;
  padding: 4px 10px;
  border-radius: 9999px;
  white-space: nowrap;
}

/* Buttons (namespaced with admin_btn_* to avoid colliding with Bootstrap's
   own .btn-success/.btn-danger/.btn-primary/.btn-secondary loaded via admin.css) */
.admin_btn_edit, .admin_btn_delete {
  padding: 7px 16px;
  font-size: 13px;
  border-radius: 8px;
  font-weight: 600;
  transition: all 0.2s ease;
  border: 1px solid transparent;
  cursor: pointer;
}

.admin_btn_edit {
  background-color: #fff7ed;
  color: #f97316;
  border-color: #fed7aa;
}

.admin_btn_edit:hover {
  background-color: #f97316;
  color: #ffffff;
}

.admin_btn_delete {
  background-color: #fef2f2;
  color: #dc2626;
  border-color: #fecaca;
}

.admin_btn_delete:hover {
  background-color: #dc2626;
  color: #ffffff;
}

.star-rating {
  color: #fbbf24;
  font-size: 16px;
}

.alert {
  background-color: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
  padding: 12px 18px;
  border-radius: 10px;
  margin-bottom: 20px;
  font-size: 14px;
}

.alert-danger {
  background-color: #fef2f2;
  color: #b91c1c;
  border: 1px solid #fecaca;
}

.close {
  background: none;
  border: none;
  color: inherit;
  font-size: 16px;
  float: right;
  cursor: pointer;
  opacity: 0.6;
}

.empty_state {
  padding: 40px 20px;
  color: #9ca3af;
}

/* Pagination */
.admin_pagination {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 6px;
  list-style: none;
  margin: 0;
  padding: 0;
}

.admin_pagination_btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  min-width: 38px;
  height: 38px;
  padding: 0 14px;
  border-radius: 9999px;
  border: 1px solid #e5e7eb;
  background-color: #ffffff;
  color: #374151;
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.2s ease;
}

.admin_pagination_num {
  padding: 0;
  min-width: 38px;
}

.admin_pagination_btn:hover {
  background-color: #fff7ed;
  border-color: #fed7aa;
  color: #f97316;
}

.admin_pagination_btn.active {
  background-color: #f97316;
  border-color: #f97316;
  color: #ffffff;
  box-shadow: 0 4px 10px rgba(249, 115, 22, 0.3);
}

.admin_pagination_btn.disabled {
  opacity: 0.5;
  cursor: not-allowed;
  color: #9ca3af;
}

.admin_pagination_btn.disabled:hover {
  background-color: #ffffff;
  border-color: #e5e7eb;
  color: #9ca3af;
}

.admin_pagination_dots {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 38px;
  height: 38px;
  color: #9ca3af;
  font-size: 13px;
}

.empty_state a {
  color: #f97316;
  font-weight: 600;
}

/* ---- Modals (Add + Edit) ---- */
.modal_overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(17, 24, 39, 0.5);
  z-index: 2000;
  align-items: center;
  justify-content: center;
  padding: 24px;
}

.modal_overlay.open {
  display: flex;
}

.modal_panel {
  background: #ffffff;
  border-radius: 16px;
  max-width: 640px;
  width: 100%;
  max-height: 90vh;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(0,0,0,0.2);
  display: flex;
  flex-direction: column;
}

.modal_panel_scroll {
  overflow-y: auto;
  padding: 32px;
}

.modal_panel_header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 4px;
}

.modal_panel h2 {
  font-size: 20px;
  font-weight: 700;
  color: #111827;
  margin: 0;
}

.modal_panel .form-subtitle {
  color: #9ca3af;
  font-size: 13px;
  margin-bottom: 24px;
}

.modal_close_btn {
  background: none;
  border: none;
  font-size: 20px;
  color: #9ca3af;
  cursor: pointer;
  line-height: 1;
  padding: 4px;
}

.modal_close_btn:hover {
  color: #374151;
}

.form-group {
  margin-bottom: 18px;
}

label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  font-size: 14px;
  color: #374151;
}

.form-control {
  width: 100%;
  padding: 11px 14px;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  background-color: #ffffff;
  color: #111827;
  font-size: 14px;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control:focus {
  outline: none;
  border-color: #f97316;
  box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.12);
}

.admin_file_upload {
  position: relative;
}

.admin_file_input {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}

.admin_file_dropzone {
  display: flex;
  align-items: center;
  gap: 12px;
  border: 1.5px dashed #d1d5db;
  border-radius: 10px;
  padding: 16px;
  background-color: #f9fafb;
  transition: all 0.2s ease;
}

.admin_file_upload:hover .admin_file_dropzone {
  border-color: #f97316;
  background-color: #fff7ed;
}

.admin_file_icon {
  width: 40px;
  height: 40px;
  border-radius: 9999px;
  background: #ffffff;
  border: 1px solid #e5e7eb;
  color: #f97316;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
}

.admin_file_text {
  flex: 1;
  min-width: 0;
}

.admin_file_text_main {
  font-size: 14px;
  font-weight: 600;
  color: #374151;
  display: block;
}

.admin_file_text_sub {
  font-size: 12px;
  color: #9ca3af;
  display: block;
  margin-top: 2px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.admin_btn_primary {
  background-color: #f97316;
  border: 1px solid #f97316;
  padding: 12px 28px;
  border-radius: 10px;
  color: #ffffff;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 0.2px;
  cursor: pointer;
  box-shadow: 0 6px 16px rgba(249, 115, 22, 0.3);
  transition: all 0.2s ease;
}

.admin_btn_primary:hover {
  background-color: #ea580c;
  border-color: #ea580c;
  box-shadow: 0 8px 20px rgba(249, 115, 22, 0.4);
  transform: translateY(-1px);
}

.admin_btn_secondary {
  background-color: #ffffff;
  border: 1.5px solid #d1d5db;
  padding: 12px 28px;
  border-radius: 10px;
  color: #1f2937;
  font-weight: 700;
  font-size: 14px;
  letter-spacing: 0.2px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.admin_btn_secondary:hover {
  background-color: #f3f4f6;
  border-color: #9ca3af;
  color: #111827;
}

.invalid-feedback {
  color: #dc2626;
  font-size: 12px;
  margin-top: 5px;
}

.text-muted {
  color: #9ca3af;
  font-size: 12px;
}

.current-image {
  max-width: 160px;
  max-height: 110px;
  border-radius: 10px;
  margin-top: 10px;
  border: 1px solid #f1f1f1;
}

.image-preview {
  background-color: #f9fafb;
  border: 1px solid #f1f1f1;
  padding: 12px;
  border-radius: 10px;
  margin-bottom: 10px;
}

.image-preview p {
  color: #374151;
  font-size: 13px;
}

/* ---- Custom dropdown / combobox ---- */
.admin_select, .admin_combobox {
  position: relative;
}

.admin_select_toggle,
.admin_combobox_input_wrap {
  display: flex;
  align-items: center;
  width: 100%;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  background: #ffffff;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.admin_select_toggle {
  padding: 11px 16px;
  justify-content: space-between;
  cursor: pointer;
  font-size: 14px;
  color: #111827;
  text-align: left;
  font-family: inherit;
}

.admin_select_toggle span.placeholder {
  color: #9ca3af;
}

.admin_select.open .admin_select_toggle,
.admin_combobox.open .admin_combobox_input_wrap,
.admin_combobox_input_wrap:focus-within {
  border-color: #f97316;
  box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.12);
}

.admin_select_toggle i,
.admin_combobox_toggle i {
  color: #9ca3af;
  font-size: 12px;
  margin-left: 12px;
  flex-shrink: 0;
  transition: transform 0.2s ease;
}

.admin_select.open .admin_select_toggle i,
.admin_combobox.open .admin_combobox_toggle i {
  transform: rotate(180deg);
}

.admin_combobox_input_wrap {
  padding-right: 6px;
}

.admin_combobox_input {
  flex: 1;
  min-width: 0;
  border: none;
  outline: none;
  padding: 11px 10px 11px 16px;
  font-size: 14px;
  color: #111827;
  background: transparent;
  font-family: inherit;
}

.admin_combobox_toggle {
  background: none;
  border: none;
  cursor: pointer;
  padding: 10px 12px;
  display: flex;
  align-items: center;
}

.admin_select_panel,
.admin_combobox_panel {
  display: none;
  position: absolute;
  top: calc(100% + 6px);
  left: 0;
  right: 0;
  background: #ffffff;
  border: 1px solid #f1f1f1;
  border-radius: 10px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
  padding: 6px;
  max-height: 220px;
  overflow-y: auto;
  z-index: 30;
}

.admin_select.open .admin_select_panel,
.admin_combobox.open .admin_select_panel {
  display: block;
}

.admin_select_option {
  padding: 10px 12px;
  font-size: 14px;
  color: #374151;
  border-radius: 8px;
  cursor: pointer;
  border-bottom: 1px solid #f5f5f5;
  transition: background-color 0.15s ease, color 0.15s ease;
}

.admin_select_option:last-child {
  border-bottom: none;
}

.admin_select_option:hover {
  background: #fff7ed;
  color: #f97316;
}

.admin_select_option[hidden] {
  display: none;
}

.form-control.is-invalid,
.admin_select.is-invalid .admin_select_toggle,
.admin_combobox.is-invalid .admin_combobox_input_wrap {
  border-color: #dc2626;
}

/* Responsive tweaks */
@media (max-width: 768px) {
  .table_deg {
    font-size: 12px;
  }

  .img_deg {
    width: 90px;
    height: 60px;
  }

  .admin_btn_edit, .admin_btn_delete {
    padding: 6px 10px;
    font-size: 12px;
  }

  .modal_panel {
    padding: 22px;
  }
}

    </style>
</head>
<body>
    @include('admin.header')

    <div class="manage_page_content">

        @if(session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        @endif

        <div class="manage_header">
            <div>
                <h1>All Posts</h1>
                <p>Manage every post listed on Favorite Places.</p>
            </div>
            <button type="button" class="btn-add-new" id="openAddModalBtn">
                <i class="fa-solid fa-circle-plus"></i> Add New
            </button>
        </div>

        <div class="table_deg_wrapper">
            <table class="table_deg">
                <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Rating</th>
                        <th>Maps Link</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td style="text-align: left; font-weight: 600; color: #111827;">{{ $post->title }}</td>
                        <td style="text-align: left; max-width: 260px;"
                            @if(strlen($post->description) > 80) title="{{ $post->description }}" @endif>
                            {{ Str::limit($post->description, 80) }}
                        </td>
                        <td>
                            @if($post->category && isset(\App\Models\Post::CATEGORIES[$post->category]))
                                <span class="tag_pill">
                                    {{ \App\Models\Post::CATEGORIES[$post->category]['emoji'] }}
                                    {{ \App\Models\Post::CATEGORIES[$post->category]['label'] }}
                                </span>
                            @else
                                <span style="color: #d1d5db;">—</span>
                            @endif
                        </td>
                        <td>
                            @if($post->location)
                                <span class="tag_pill">{{ $post->location }}</span>
                            @else
                                <span style="color: #d1d5db;">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="star-rating">★</span> {{ $post->rating }}
                        </td>
                        <td>
                            @if($post->maps_link)
                                <a href="{{ $post->maps_link }}" target="_blank" style="color: #f97316; font-weight: 500;">View Map</a>
                            @else
                                <span style="color: #d1d5db;">No Link</span>
                            @endif
                        </td>
                        <td>
                            <img class="img_deg" src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}">
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <button type="button" class="admin_btn_edit" onclick="openEditModal({{ $post->id }})">Edit</button>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin_btn_delete" onclick="confirmation(event)">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty_state">
                                No posts found. <a href="#" onclick="openAddModal(); return false;">Create one now</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div style="text-align: center; margin-top: 24px;">
            {{ $posts->links('pagination.admin') }}
        </div>

    </div>

    @php
        $ratingOptions = ['1' => '1 - Poor', '2' => '2 - Fair', '3' => '3 - Good', '4' => '4 - Very Good', '5' => '5 - Excellent'];
        $failedEditId = old('_edit_id');
    @endphp

    <!-- Add Post Modal -->
    <div class="modal_overlay" id="addPostModal">
        <div class="modal_panel">
          <div class="modal_panel_scroll">
            <div class="modal_panel_header">
                <div>
                    <h2>Add New Post</h2>
                </div>
                <button type="button" class="modal_close_btn" onclick="closeAddModal()" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <p class="form-subtitle">Fill in the details below to add a new place to Favorite Places.</p>

            @if($errors->any() && !$failedEditId)
                <div class="alert alert-danger">
                    <ul class="mb-0" style="padding-left: 18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Post Title *</label>
                    <input type="text"
                           name="title"
                           id="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title') }}"
                           required
                           placeholder="Enter post title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Post Description *</label>
                    <textarea name="description"
                              id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="4"
                              required
                              placeholder="Describe the post...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @php
                    $selectedRating = old('rating');
                    $selectedCategory = old('category');
                @endphp

                <div class="form-group">
                    <label for="rating">Rating (1-5) *</label>
                    <div class="admin_select @error('rating') is-invalid @enderror" data-admin-select>
                        <button type="button" class="admin_select_toggle" data-select-toggle>
                            <span data-select-label class="{{ $selectedRating ? '' : 'placeholder' }}">{{ $selectedRating ? $ratingOptions[$selectedRating] : 'Select Rating' }}</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="admin_select_panel" data-select-panel>
                            @foreach($ratingOptions as $val => $labelText)
                                <div class="admin_select_option" data-select-option data-value="{{ $val }}">{{ $labelText }}</div>
                            @endforeach
                        </div>
                        <input type="hidden" name="rating" id="rating" data-select-input value="{{ $selectedRating }}">
                    </div>
                    @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category *</label>
                    <div class="admin_select @error('category') is-invalid @enderror" data-admin-select>
                        <button type="button" class="admin_select_toggle" data-select-toggle>
                            <span data-select-label class="{{ $selectedCategory ? '' : 'placeholder' }}">
                                {{ $selectedCategory && isset(\App\Models\Post::CATEGORIES[$selectedCategory]) ? \App\Models\Post::CATEGORIES[$selectedCategory]['emoji'] . ' ' . \App\Models\Post::CATEGORIES[$selectedCategory]['label'] : 'Select Category' }}
                            </span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                        <div class="admin_select_panel" data-select-panel>
                            @foreach(\App\Models\Post::CATEGORIES as $key => $cat)
                                <div class="admin_select_option" data-select-option data-value="{{ $key }}">{{ $cat['emoji'] }} {{ $cat['label'] }}</div>
                            @endforeach
                        </div>
                        <input type="hidden" name="category" id="category" data-select-input value="{{ $selectedCategory }}">
                    </div>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="location">Location Tag *</label>
                    <div class="admin_combobox @error('location') is-invalid @enderror" data-admin-combobox>
                        <div class="admin_combobox_input_wrap">
                            <input type="text"
                                   name="location"
                                   id="location"
                                   class="admin_combobox_input"
                                   data-combobox-input
                                   value="{{ old('location') }}"
                                   required
                                   autocomplete="off"
                                   placeholder="e.g. Ubud, Nusa Dua, Sanur...">
                            <button type="button" class="admin_combobox_toggle" data-combobox-toggle aria-label="Show suggestions">
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="admin_select_panel" data-combobox-panel>
                            @forelse($locations as $loc)
                                <div class="admin_select_option" data-select-option data-value="{{ $loc }}">{{ $loc }}</div>
                            @empty
                                <div class="admin_select_option" style="color:#9ca3af; cursor:default;">No locations yet — type below to add one</div>
                            @endforelse
                        </div>
                    </div>
                    <small class="text-muted">Not in the list? Just type a new location — it'll be added automatically.</small>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="maps_link">Google Maps Link</label>
                    <input type="url"
                           name="maps_link"
                           id="maps_link"
                           class="form-control @error('maps_link') is-invalid @enderror"
                           value="{{ old('maps_link') }}"
                           placeholder="https://maps.google.com/...">
                    <small class="text-muted">Optional: Add Google Maps link for this location</small>
                    @error('maps_link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Add Image</label>
                    <div class="admin_file_upload">
                        <input type="file"
                               name="image"
                               id="image"
                               class="admin_file_input @error('image') is-invalid @enderror"
                               accept="image/*"
                               onchange="updateFileLabel(this)">
                        <div class="admin_file_dropzone">
                            <span class="admin_file_icon"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                            <span class="admin_file_text">
                                <span class="admin_file_text_main" data-file-label>Click to upload an image</span>
                                <span class="admin_file_text_sub">JPEG, PNG, JPG or GIF (Max 2MB) — leave empty to use default image</span>
                            </span>
                        </div>
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="margin-bottom: 0; display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" class="admin_btn_secondary" onclick="closeAddModal()">Cancel</button>
                    <button type="submit" class="admin_btn_primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <!-- Edit Post Modals (one per row) -->
    @foreach($posts as $post)
        @php
            $isFailedEdit = $failedEditId && (int) $failedEditId === $post->id;
            $editTitle = $isFailedEdit ? old('title') : $post->title;
            $editDescription = $isFailedEdit ? old('description') : $post->description;
            $editRating = $isFailedEdit ? old('rating') : (string) $post->rating;
            $editCategory = $isFailedEdit ? old('category') : $post->category;
            $editLocation = $isFailedEdit ? old('location') : $post->location;
            $editMapsLink = $isFailedEdit ? old('maps_link') : $post->maps_link;
        @endphp
        <div class="modal_overlay @if($isFailedEdit) open @endif" id="editModal{{ $post->id }}">
            <div class="modal_panel">
              <div class="modal_panel_scroll">
                <div class="modal_panel_header">
                    <div>
                        <h2>Edit Post</h2>
                    </div>
                    <button type="button" class="modal_close_btn" onclick="closeEditModal({{ $post->id }})" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <p class="form-subtitle">Update the details for this Favorite Places listing.</p>

                @if($isFailedEdit && $errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0" style="padding-left: 18px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_edit_id" value="{{ $post->id }}">

                    <div class="form-group">
                        <label for="title_{{ $post->id }}">Post Title *</label>
                        <input type="text"
                               name="title"
                               id="title_{{ $post->id }}"
                               class="form-control @if($isFailedEdit) @error('title') is-invalid @enderror @endif"
                               value="{{ $editTitle }}"
                               required
                               placeholder="Enter post title">
                        @if($isFailedEdit)
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description_{{ $post->id }}">Post Description *</label>
                        <textarea name="description"
                                  id="description_{{ $post->id }}"
                                  class="form-control @if($isFailedEdit) @error('description') is-invalid @enderror @endif"
                                  rows="4"
                                  required
                                  placeholder="Describe the post...">{{ $editDescription }}</textarea>
                        @if($isFailedEdit)
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="rating_{{ $post->id }}">Rating (1-5) *</label>
                        <div class="admin_select" data-admin-select>
                            <button type="button" class="admin_select_toggle" data-select-toggle>
                                <span data-select-label>{{ $ratingOptions[$editRating] ?? 'Select Rating' }}</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                            <div class="admin_select_panel" data-select-panel>
                                @foreach($ratingOptions as $val => $labelText)
                                    <div class="admin_select_option" data-select-option data-value="{{ $val }}">{{ $labelText }}</div>
                                @endforeach
                            </div>
                            <input type="hidden" name="rating" id="rating_{{ $post->id }}" data-select-input value="{{ $editRating }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_{{ $post->id }}">Category *</label>
                        <div class="admin_select" data-admin-select>
                            <button type="button" class="admin_select_toggle" data-select-toggle>
                                <span data-select-label>
                                    {{ $editCategory && isset(\App\Models\Post::CATEGORIES[$editCategory]) ? \App\Models\Post::CATEGORIES[$editCategory]['emoji'] . ' ' . \App\Models\Post::CATEGORIES[$editCategory]['label'] : 'Select Category' }}
                                </span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                            <div class="admin_select_panel" data-select-panel>
                                @foreach(\App\Models\Post::CATEGORIES as $key => $cat)
                                    <div class="admin_select_option" data-select-option data-value="{{ $key }}">{{ $cat['emoji'] }} {{ $cat['label'] }}</div>
                                @endforeach
                            </div>
                            <input type="hidden" name="category" id="category_{{ $post->id }}" data-select-input value="{{ $editCategory }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location_{{ $post->id }}">Location Tag *</label>
                        <div class="admin_combobox" data-admin-combobox>
                            <div class="admin_combobox_input_wrap">
                                <input type="text"
                                       name="location"
                                       id="location_{{ $post->id }}"
                                       class="admin_combobox_input"
                                       data-combobox-input
                                       value="{{ $editLocation }}"
                                       required
                                       autocomplete="off"
                                       placeholder="e.g. Ubud, Nusa Dua, Sanur...">
                                <button type="button" class="admin_combobox_toggle" data-combobox-toggle aria-label="Show suggestions">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                            </div>
                            <div class="admin_select_panel" data-combobox-panel>
                                @forelse($locations as $loc)
                                    <div class="admin_select_option" data-select-option data-value="{{ $loc }}">{{ $loc }}</div>
                                @empty
                                    <div class="admin_select_option" style="color:#9ca3af; cursor:default;">No locations yet — type below to add one</div>
                                @endforelse
                            </div>
                        </div>
                        <small class="text-muted">Not in the list? Just type a new location — it'll be added automatically.</small>
                    </div>

                    <div class="form-group">
                        <label for="maps_link_{{ $post->id }}">Google Maps Link</label>
                        <input type="url"
                               name="maps_link"
                               id="maps_link_{{ $post->id }}"
                               class="form-control"
                               value="{{ $editMapsLink }}"
                               placeholder="https://maps.google.com/...">
                        <small class="text-muted">Optional: Add Google Maps link for this location</small>
                    </div>

                    <div class="form-group">
                        <label for="image_{{ $post->id }}">Post Image</label>
                        <div class="image-preview">
                            <p class="mb-1"><strong>Current image:</strong> {{ $post->image }}</p>
                            <img src="{{ asset('images/posts/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="current-image">
                        </div>
                        <div class="admin_file_upload">
                            <input type="file"
                                   name="image"
                                   id="image_{{ $post->id }}"
                                   class="admin_file_input"
                                   accept="image/*"
                                   onchange="updateFileLabel(this)">
                            <div class="admin_file_dropzone">
                                <span class="admin_file_icon"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                                <span class="admin_file_text">
                                    <span class="admin_file_text_main" data-file-label>Click to replace image</span>
                                    <span class="admin_file_text_sub">JPEG, PNG, JPG or GIF (Max 2MB) — leave empty to keep current image</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0; display: flex; justify-content: flex-end; gap: 10px;">
                        <button type="button" class="admin_btn_secondary" onclick="closeEditModal({{ $post->id }})">Cancel</button>
                        <button type="submit" class="admin_btn_primary">Update Post</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    @endforeach

    @include('admin.footer')

<script type="text/javascript">
function openAddModal() {
    document.getElementById('addPostModal').classList.add('open');
}
function closeAddModal() {
    document.getElementById('addPostModal').classList.remove('open');
}
function openEditModal(id) {
    var modal = document.getElementById('editModal' + id);
    if (modal) modal.classList.add('open');
}
function closeEditModal(id) {
    var modal = document.getElementById('editModal' + id);
    if (modal) modal.classList.remove('open');
}

function updateFileLabel(input) {
    var wrapper = input.closest('.admin_file_upload');
    var label = wrapper ? wrapper.querySelector('[data-file-label]') : null;
    if (!label) return;
    label.textContent = input.files && input.files.length ? input.files[0].name : label.getAttribute('data-default-text') || label.textContent;
}

document.getElementById('openAddModalBtn').addEventListener('click', openAddModal);

document.querySelectorAll('.modal_overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
        if (e.target === this) this.classList.remove('open');
    });
});

@if($errors->any() && !$failedEditId)
    openAddModal();
@endif

function initAdminSelect(root) {
    var toggle = root.querySelector('[data-select-toggle]');
    var label = root.querySelector('[data-select-label]');
    var input = root.querySelector('[data-select-input]');

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        document.querySelectorAll('.admin_select.open, .admin_combobox.open').forEach(function (el) {
            if (el !== root) el.classList.remove('open');
        });
        root.classList.toggle('open');
    });

    root.querySelectorAll('[data-select-option]').forEach(function (opt) {
        opt.addEventListener('click', function () {
            label.textContent = opt.textContent.trim();
            label.classList.remove('placeholder');
            input.value = opt.getAttribute('data-value');
            root.classList.remove('open');
        });
    });
}

function initAdminCombobox(root) {
    var input = root.querySelector('[data-combobox-input]');
    var toggle = root.querySelector('[data-combobox-toggle]');
    var options = root.querySelectorAll('[data-select-option]');

    function openPanel() { root.classList.add('open'); }
    function closePanel() { root.classList.remove('open'); }

    function filterOptions() {
        var q = input.value.trim().toLowerCase();
        options.forEach(function (opt) {
            var text = opt.textContent.trim().toLowerCase();
            opt.hidden = q.length > 0 && !text.includes(q);
        });
    }

    input.addEventListener('focus', function () {
        filterOptions();
        openPanel();
    });
    input.addEventListener('input', function () {
        filterOptions();
        openPanel();
    });
    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        if (root.classList.contains('open')) {
            closePanel();
        } else {
            filterOptions();
            openPanel();
        }
    });

    options.forEach(function (opt) {
        if (!opt.hasAttribute('data-value')) return;
        opt.addEventListener('click', function () {
            input.value = opt.getAttribute('data-value');
            closePanel();
        });
    });
}

document.addEventListener('click', function (e) {
    document.querySelectorAll('.admin_select.open, .admin_combobox.open').forEach(function (el) {
        if (!el.contains(e.target)) {
            el.classList.remove('open');
        }
    });
});

document.querySelectorAll('[data-admin-select]').forEach(initAdminSelect);
document.querySelectorAll('[data-admin-combobox]').forEach(initAdminCombobox);

function confirmation(ev) {
    ev.preventDefault();

    var urlToRedirect = ev.currentTarget.closest('form').getAttribute('action');

    console.log(urlToRedirect);

    swal({
        title: "Are you sure to delete this?",
        text: "You won't be able to revert this delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCancel) => {
        if (willCancel) {
            ev.currentTarget.closest('form').submit();
        }
    });
}
</script>

</body>
</html>
