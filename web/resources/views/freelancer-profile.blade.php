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
        body {
          background-color: #f8f9fa;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .profile-container {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border: none;
        }
        /* Sidebar Styles */
        .profile-sidebar .card-body {
            text-align: center;
        }
        .profile-pic-container {
            position: relative;
            display: inline-block;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .change-photo-btn {
            display: none;
            position: absolute;
            bottom: 1rem;
            right: 0;
            background-color: #4f46e5;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: transform 0.2s ease-in-out;
        }
        .edit-mode .change-photo-btn {
            display: flex;
        }
        .change-photo-btn:hover {
            transform: scale(1.1);
        }
        #profilePicInput {
            display: none;
        }
        .profile-sidebar h5 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }
        .profile-sidebar .text-muted {
            font-size: 0.9rem;
        }
        .hourly-rate {
            font-size: 1.2rem;
            font-weight: 500;
            margin: 0.5rem 0;
        }
        .btn-edit {
             border-radius: 20px;
             padding: 0.5rem 1.5rem;
             margin-top: 0.5rem;
        }
        .verification-badge {
            font-size: 0.8rem;
            padding: 0.4em 0.8em;
        }

        .profile-section {
            margin-bottom: 2rem;
        }
        .profile-section h5 {
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 2px solid #eaf2f7;
            padding-bottom: 0.5rem;
        }
        .info-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f1f1;
        }
        .info-list li:last-child {
            border-bottom: none;
        }
        .info-list .label {
            font-weight: 500;
            color: #6c757d;
        }
        .info-list .value {
            color: #212529;
            text-align: right;
        }
        .document-status {
            color: #dc3545;
        }
        .document-status.uploaded {
            color: #198754;
        }
        .skills-list .badge {
            font-size: 0.85rem;
            padding: 0.5em 0.9em;
            margin: 0.25rem;
            background-color: #eaf2f7;
            color: #0060aa;
        }

        .editable-field {
            display: none;
        }
        .edit-mode .editable-field {
            display: block;
        }
        .edit-mode .value {
            display: none;
        }
        .editable-field .form-control, .editable-field .form-select {
            background-color: #eaf2f7;
            border-radius: 20px;
            border: 1px solid #eaf2f7;
        }
        .editable-field .form-control:focus, .editable-field .form-select:focus {
            background-color: #eaf2f7;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
            border-color: #a9a5f7;
        }
        .edit-actions {
            display: none;
        }
        .edit-mode .edit-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }
        .edit-mode .default-actions {
            display: none;
        }
        
        .modal-content {
            border-radius: 15px;
            border: none;
        }
        .modal-body .form-control {
            background-color: #eaf2f7;
            border-radius: 20px;
            border: 1px solid #eaf2f7;
            padding: 0.75rem 1rem;
        }
        .modal-body .form-control:focus {
            background-color: #eaf2f7;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
            border-color: #a9a5f7;
        }
    </style>
</head>
<body>

<div class="container profile-container">
    <div class="row" id="profileRow">

        <div class="col-lg-4 profile-sidebar mb-4 mb-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="profile-pic-container">
                        <img src="https://placehold.co/150x150/EAF2F7/0060AA?text=Avatar" alt="Profile Picture" class="profile-pic" id="profilePicImg">
                        <label for="profilePicInput" class="change-photo-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" name="profile_picture" id="profilePicInput" accept="image/*">
                    </div>
                    
                    <h5>[Username]</h5>

                    <span class="badge rounded-pill bg-success verification-badge"><i class="fas fa-check-circle me-1"></i>Verified</span>
                    
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="col-lg-8 profile-content">
            <form id="profileForm" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body p-4">

                    <!-- Personal Information Section -->
                    <div class="profile-section">
                        <h5>Personal & Contact Information</h5>
                        <ul class="list-unstyled info-list">
                            <li>
                                <span class="label">Full Name</span> 
                                <span class="value">[Full Name]</span>
                                <input type="text" name="fullname" class="form-control editable-field" value="[Full Name]">
                            </li>
                            <li><span class="label">Email</span> <span class="value">[email@example.com]</span></li>
                            <li>
                                <span class="label">Phone</span> 
                                <span class="value">[+1 234 567 890]</span>
                                <input type="tel" name="phone" class="form-control editable-field" value="+1 234 567 890">
                            </li>
                            <li>
                                <span class="label">Date of Birth</span> 
                                <span class="value">[Jan 01, 1990]</span>
                                <input type="date" name="birthdate" class="form-control editable-field" value="1990-01-01">
                            </li>
                            <li>
                                <span class="label">Address</span> 
                                <span class="value">[123 Cyber St, Secure City, USA]</span>
                                <input type="text" name="address" class="form-control editable-field" value="123 Cyber St, Secure City, USA">
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Verification Documents Section -->
                    <div class="profile-section">
                        <h5>Verification Documents</h5>
                        <ul class="list-unstyled info-list">
                            <li>
                                <span class="label">Curriculum Vitae (CV)</span> 
                                <span class="value document-status uploaded"><i class="fas fa-check-circle me-1"></i>Uploaded</span>
                                <div class="editable-field">
                                    <input type="file" name="cv" class="form-control">
                                </div>
                            </li>
                            <li>
                                <span class="label">Portfolio</span> 
                                <span class="value document-status"><i class="fas fa-times-circle me-1"></i>Not Uploaded</span>
                                <div class="editable-field">
                                    <input type="file" name="portfolio" class="form-control">
                                </div>
                            </li>
                            <li>
                                <span class="label">Government ID</span> 
                                <span class="value document-status uploaded"><i class="fas fa-check-circle me-1"></i>Uploaded</span>
                                <div class="editable-field">
                                    <input type="file" name="government_id" class="form-control">
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Security Section -->
                    <div class="profile-section">
                        <h5>Security</h5>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                            Change Password
                        </button>
                    </div>
                    
                    <!-- Edit Mode Action Buttons -->
                    <div class="mt-4 edit-actions">
                        <button type="button" class="btn btn-secondary" id="cancelButton">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                    </div>

                </div> <!-- End Card Body -->
            </div> <!-- End Card -->
            </form>
        </div> <!-- End Main Content Col -->

    </div> <!-- End Row -->
</div> <!-- End Container -->

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="passwordChangeForm">
          <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Password</button>
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
            if (isEditing) {
                profileRow.classList.add('edit-mode');
            } else {
                profileRow.classList.remove('edit-mode');
            }
        }

        editProfileButton.addEventListener('click', () => {
            originalImageSrc = profilePicImg.src;
            profileForm.querySelectorAll('input, textarea').forEach(input => {
                if (input.type !== 'file') {
                    originalValues[input.name] = input.value;
                }
            });
            toggleEditMode(true);
        });

        cancelButton.addEventListener('click', () => {
            profilePicImg.src = originalImageSrc;
            profilePicInput.value = '';
            profileForm.querySelectorAll('input, textarea').forEach(input => {
                if (originalValues[input.name]) {
                    input.value = originalValues[input.name];
                }
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
            event.preventDefault(); 
            
            originalImageSrc = profilePicImg.src;

            profileForm.querySelectorAll('input[type="text"], input[type="tel"], input[type="date"], textarea').forEach(input => {
                const displayElement = input.closest('li, .profile-section').querySelector('.value');
                if (displayElement) {
                    if (input.type === 'date' && input.value) {
                         const date = new Date(input.value);
                         const options = { year: 'numeric', month: 'short', day: 'numeric', timeZone: 'UTC' };
                         displayElement.textContent = date.toLocaleDateString('en-US', options);
                    } else {
                        displayElement.textContent = input.value || 'Not Provided';
                    }
                }
            });

            const skillsInput = profileForm.querySelector('input[name="skills"]');
            const skillsDisplay = profileForm.querySelector('.skills-list');
            if(skillsInput && skillsDisplay) {
                skillsDisplay.innerHTML = '';
                const skills = skillsInput.value.split(',').map(skill => skill.trim()).filter(skill => skill);
                skills.forEach(skillText => {
                    const badge = document.createElement('span');
                    badge.className = 'badge rounded-pill';
                    badge.textContent = skillText;
                    skillsDisplay.appendChild(badge);
                });
            }

            profileForm.querySelectorAll('input[type="file"]').forEach(input => {
                if (input.name === 'profile_picture') return; 

                const displayElement = input.closest('li').querySelector('.value');
                if (input.files.length > 0) {
                    displayElement.innerHTML = `<i class="fas fa-check-circle me-1"></i>Uploaded (${input.files[0].name})`;
                    displayElement.classList.add('uploaded');
                }
            });

            alert('Changes saved temporarily! Data is updated on the page.');
            
            toggleEditMode(false);
        });
    });
</script>

</body>
</html>

