<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Freelancer Profile - H3kHire</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="shortcut icon" type="image/png" href="images/fav-icon.png" />

    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover-color: #3b31c4;
            --light-gray-color: #f3f4f6;
            --medium-gray-color: #e5e7eb;
            --text-color: #1f2937;
            --text-muted-color: #6b7280;
            --success-color: #10b981;
            --warning-color: #f59e0b;
        }

        body {
          background-color: var(--light-gray-color);
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          color: var(--text-color);
        }

        #backButton {
            position: fixed;
            top: 1.5rem;
            left: 1.5rem;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: #fff;
            color: var(--text-muted-color);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        #backButton:hover {
            background-color: var(--primary-color);
            color: #fff;
            transform: scale(1.1);
        }

        .profile-container {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.07), 0 4px 6px -2px rgba(0,0,0,0.05);
            border: none;
        }

        .profile-sidebar .card {
            padding: 1.5rem;
        }
        .profile-sidebar .card-body {
            text-align: center;
        }
        .profile-pic-container {
            position: relative;
            display: inline-block;
        }
        .profile-pic {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1.5rem;
            border: 5px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .change-photo-btn {
            display: none;
            position: absolute;
            bottom: 1.5rem;
            right: 0.5rem;
            background-color: var(--primary-color);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #fff;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: transform 0.2s ease-in-out;
        }
        .edit-mode .change-photo-btn { display: flex; }
        .change-photo-btn:hover { transform: scale(1.1); }
        #profilePicInput { display: none; }

        .profile-sidebar h5 {
            margin-bottom: 0.25rem;
            font-weight: 600;
            font-size: 1.25rem;
        }
        .profile-sidebar .text-muted {
            font-size: 0.9rem;
            color: var(--text-muted-color);
        }
        .verification-badge {
            font-size: 0.8rem;
            padding: 0.4em 0.8em;
            font-weight: 600;
            margin-top: 0.75rem;
        }
        .btn-edit {
             border-radius: 20px;
             padding: 0.5rem 1.5rem;
             margin-top: 1.5rem;
             font-weight: 500;
        }

        .profile-section { margin-bottom: 2.5rem; }
        .profile-section h5 {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }
        .info-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--light-gray-color);
        }
        .info-list li:last-child { border-bottom: none; }
        .info-list .label {
            font-weight: 500;
            color: var(--text-muted-color);
        }
        .info-list .value {
            color: var(--text-color);
            font-weight: 500;
            text-align: right;
        }

        .editable-field { display: none; }
        .edit-mode .editable-field { display: block; }
        .edit-mode .value { display: none; }
        .editable-field .form-control {
            background-color: var(--light-gray-color);
            border-radius: 0.75rem;
            border: 1px solid var(--medium-gray-color);
            padding: 0.5rem 1rem;
        }
        .editable-field .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
            border-color: var(--primary-color);
        }
        .edit-actions { display: none; }
        .edit-mode .edit-actions { display: flex; justify-content: flex-end; gap: 0.75rem; }
        .edit-mode .default-actions { display: none; }

        /* Skills style */
        .skills-list .badge {
            background-color: var(--primary-color);
            color: white;
            padding: 0.4em 0.8em;
            font-size: 0.85rem;
        }

        .modal-content { border-radius: 1rem; border: none; }
    </style>
</head>
<body>

<a href="javascript:history.back()" id="backButton">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="container profile-container">
    <div class="row" id="profileRow">

        <!-- Sidebar Section -->
        <div class="col-lg-4 profile-sidebar mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="profile-pic-container">
                        <img src="{{ $user->profile_picture ? url('storage/' . $user->profile_picture) : 'https://placehold.co/150x150/EAF2F7/0060AA?text=Avatar' }}" alt="Profile Picture" class="profile-pic" id="profilePicImg">
                        <label for="profilePicInput" class="change-photo-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>

                    <h5>{{ $user->name }}</h5>
                    <span class="badge rounded-pill bg-success verification-badge" id="verificationStatus">
                        <i class="fas fa-check-circle me-1"></i>Verified
                    </span>

                    <div class="default-actions">
                        <button type="button" class="btn btn-outline-secondary btn-edit btn-sm" id="editProfileButton">Edit Profile</button> 
                    </div>

                    <hr class="my-4">

                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="col-lg-8 profile-content">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Validation Errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Hidden file input container for profile picture -->
            <div style="display: none;">
                <input type="file" name="profile_picture" id="profilePicInput" accept="image/*">
            </div>
            <div class="card">
                <div class="card-body p-4 p-md-5">

                    <!-- Profile Information -->
                    <div class="profile-section">
                        <h5>Profile Information</h5>
                        <ul class="list-unstyled info-list">
                            <li>
                                <span class="label">Full Name</span> 
                                <span class="value">{{ $user->name ?? '[Full Name]' }}</span>
                                <input type="text" name="fullname" class="form-control editable-field" value="{{ $user->name }}">
                            </li>
                            <li><span class="label">Email</span> <span class="value">{{ $user->email }}</span></li>
                            <li>
                                <span class="label">Phone</span> 
                                <span class="value">{{ $user->phone ?? '[Not Provided]' }}</span>
                                <input type="tel" name="phone" class="form-control editable-field" value="{{ $user->phone }}">
                            </li>
                            <li>
                                <span class="label">Address</span> 
                                <span class="value">{{ $user->address ?? '[Not Provided]' }}</span>
                                <input type="text" name="address" class="form-control editable-field" value="{{ $user->address }}">
                            </li>
                        </ul>
                    </div>

                    <!-- Verification -->
                    <div class="profile-section">
                        <h5>Verification Documents</h5>
                        <ul class="list-unstyled info-list">
                            <li>
                                <span class="label">Curriculum Vitae (CV)</span> 
                                <span class="value">
                                    @if($user->cv)
                                        <a href="{{ url('storage/' . $user->cv) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-download me-1"></i>Download
                                        </a>
                                    @else
                                        [Not Provided]
                                    @endif
                                </span>
                                <div class="editable-field">
                                    <input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx">
                                    <small class="text-muted d-block mt-1">PDF, DOC or DOCX (Max 5MB)</small>
                                </div>
                            </li>
                            <li>
                                <span class="label">Portfolio</span> 
                                <span class="value">
                                    @if($user->portfolio)
                                        <a href="{{ url('storage/' . $user->portfolio) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-download me-1"></i>Download
                                        </a>
                                    @else
                                        [Not Provided]
                                    @endif
                                </span>
                                <div class="editable-field">
                                    <input type="file" name="portfolio" class="form-control" accept=".pdf,.zip,.rar">
                                    <small class="text-muted d-block mt-1">PDF, ZIP or RAR (Max 10MB)</small>
                                </div>
                            </li>
                            <li>
                                <span class="label">Government ID</span> 
                                <span class="value">
                                    @if($user->government_id)
                                        <a href="{{ url('storage/' . $user->government_id) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-eye me-1"></i>View
                                        </a>
                                    @else
                                        [Not Provided]
                                    @endif
                                </span>
                                <div class="editable-field">
                                    <input type="file" name="government_id" class="form-control" accept=".jpg,.jpeg,.png">
                                    <small class="text-muted d-block mt-1">JPG or PNG (Max 2MB)</small>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- About Me Section -->
                    <div class="profile-section">
                        <h5>About Me</h5>
                        <div class="mb-3">
                            <span class="d-block mb-2">{{ $user->about_me ?? '[Not Provided]' }}</span>
                            <textarea name="about_me" class="form-control editable-field" rows="3" placeholder="Tell something about yourself...">{{ $user->about_me }}</textarea>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="profile-section">
                        <h5>Skills</h5>
                        <div class="mb-3">
                            <div class="skills-list d-flex flex-wrap gap-2 mb-2">
                                @if($user->skills)
                                    @foreach(explode(',', $user->skills) as $skill)
                                        <span class="badge rounded-pill bg-info">{{ trim($skill) }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">[Not Provided]</span>
                                @endif
                            </div>
                            <input type="text" name="skills" class="form-control editable-field" placeholder="e.g. Python, Laravel, Networking" value="{{ $user->skills }}">
                            <small class="text-muted d-block mt-1">Separate skills with commas</small>
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="profile-section">
                        <h5>Security</h5>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            Change Password
                        </button>
                    </div>

                    <div class="mt-4 edit-actions">
                        <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="passwordChangeForm" action="{{ route('profile.change-password') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
            @error('current_password')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
            @error('new_password')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            <small class="text-muted d-block mt-2">Password must be at least 8 characters and contain uppercase, lowercase, number, and special character.</small>
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="passwordChangeForm" class="btn btn-primary">Save Password</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editProfileButton = document.getElementById('editProfileButton');
    const cancelButton = document.getElementById('cancelButton');
    const profileForm = document.getElementById('profileForm');
    const profileRow = document.getElementById('profileRow');
    const profilePicImg = document.getElementById('profilePicImg');
    const profilePicInput = document.getElementById('profilePicInput');

    let originalValues = {};
    let originalImageSrc = profilePicImg.src;

    function toggleEditMode(isEditing) {
        if (isEditing) profileRow.classList.add('edit-mode');
        else profileRow.classList.remove('edit-mode');
    }

    editProfileButton.addEventListener('click', () => {
        originalImageSrc = profilePicImg.src;
        profileForm.querySelectorAll('input, textarea').forEach(input => {
            if (input.type !== 'file') originalValues[input.name] = input.value;
        });
        toggleEditMode(true);
    });

    cancelButton.addEventListener('click', () => {
        profilePicImg.src = originalImageSrc;
        profilePicInput.value = '';
        profileForm.querySelectorAll('input, textarea').forEach(input => {
            if (originalValues[input.name]) input.value = originalValues[input.name];
        });
        toggleEditMode(false);
    });

    profilePicInput.addEventListener('change', (event) => {
        if (event.target.files && event.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicImg.src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    });

    profileForm.addEventListener('submit', function(event) {
        // Update form display values but don't update image preview
        // Let the form submit and the page reload will show the actual saved image

        // Update displayed values from form inputs
        const aboutInput = profileForm.querySelector('textarea[name="about_me"]');
        if (aboutInput) {
            const displayElement = aboutInput.parentElement.querySelector('span.d-block');
            if (displayElement) {
                displayElement.textContent = aboutInput.value || '[Not Provided]';
            }
        }

        const skillsInput = profileForm.querySelector('input[name="skills"]');
        const skillsDisplay = profileForm.querySelector('.skills-list');
        if (skillsInput && skillsDisplay) {
            skillsDisplay.innerHTML = '';
            const skills = skillsInput.value.split(',').map(s => s.trim()).filter(Boolean);
            if (skills.length > 0) {
                skills.forEach(skillText => {
                    const badge = document.createElement('span');
                    badge.className = 'badge rounded-pill bg-info';
                    badge.textContent = skillText;
                    skillsDisplay.appendChild(badge);
                });
            } else {
                skillsDisplay.innerHTML = '<span class="text-muted">[Not Provided]</span>';
            }
        }

        toggleEditMode(false);
        // Form will submit normally via POST to the server
        // Page reload will display the saved profile picture and files from database
    });
});
</script>
</body>
</html>
