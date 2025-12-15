<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>User Profile - H3kHire</title>
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
        
        /* Sidebar Styles */
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

        /* Main Content Styles */
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
        
        /* Edit Mode Styles */
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

        /* Modal Styles */
        .modal-content { border-radius: 1rem; border: none; }
        .modal-body .form-control {
            background-color: var(--light-gray-color);
            border-radius: 0.75rem;
            border: 1px solid var(--medium-gray-color);
            padding: 0.75rem 1rem;
        }
        .modal-body .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
            border-color: var(--primary-color);
        }
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
                    <span class="text-muted d-block mb-2" style="font-size: 0.9rem;">{{ $user->company_name ?? 'Individual' }}</span>

                    <span class="badge rounded-pill bg-success verification-badge" id="verificationStatus">
                        <i class="fas fa-check-circle me-1"></i>Verified
                    </span>
                    
                    <div class="default-actions">
                        <button type="button" class="btn btn-outline-secondary btn-edit btn-sm" id="editProfileButton">Edit Profile</button> 
                    </div>
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

                    <!-- Personal Information Section -->
                    <div class="profile-section">
                        <h5>Profile Information</h5>
                        <ul class="list-unstyled info-list">
                            <li>
                                <span class="label">Full Name</span> 
                                <span class="value">{{ $user->name ?? '[Not Provided]' }}</span>
                                <input type="text" name="fullname" class="form-control editable-field" value="{{ $user->name }}">
                            </li>
                             <li>
                                <span class="label">Company Name</span> 
                                <span class="value">{{ $user->company_name ?? '[Not Provided]' }}</span>
                                <input type="text" name="company_name" class="form-control editable-field" value="{{ $user->company_name }}">
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
                            <input type="text" name="skills" class="form-control editable-field" placeholder="Separate skills with commas" value="{{ $user->skills }}">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 justify-content-end edit-actions">
                        <button type="button" class="btn btn-secondary btn-sm" id="cancelButton">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </div>
            </div>
            </form>
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
    const verificationStatus = document.getElementById('verificationStatus');

    let originalValues = {};
    let originalImageSrc = profilePicImg.src;

    function toggleEditMode(isEditing) {
        if (isEditing) {
            profileRow.classList.add('edit-mode');
        } else {
            profileRow.classList.remove('edit-mode');
        }
    }

    function checkVerificationStatus() {
        const fullname = profileForm.querySelector('input[name="fullname"]').value;
        const company_name = profileForm.querySelector('input[name="company_name"]').value;
        const phone = profileForm.querySelector('input[name="phone"]').value;
        const address = profileForm.querySelector('input[name="address"]').value;

        if (fullname && company_name && phone && address) {
            verificationStatus.innerHTML = '<i class="fas fa-check-circle me-1"></i>Verified';
            verificationStatus.classList.remove('bg-warning', 'text-dark');
            verificationStatus.classList.add('bg-success');
        } else {
            verificationStatus.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i>Not Verified';
            verificationStatus.classList.remove('bg-success');
            verificationStatus.classList.add('bg-warning', 'text-dark');
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
    
    // File size validation function
    function validateFileSize(fileInput, maxSizeMB, fieldName) {
        if (fileInput.files && fileInput.files[0]) {
            const file = fileInput.files[0];
            const maxSizeBytes = maxSizeMB * 1024 * 1024;
            
            if (file.size > maxSizeBytes) {
                alert(`${fieldName} is too large! Maximum allowed size is ${maxSizeMB}MB. Your file is ${(file.size / 1024 / 1024).toFixed(2)}MB.`);
                fileInput.value = '';
                return false;
            }
        }
        return true;
    }

    profilePicInput.addEventListener('change', (event) => {
        if (event.target.files && event.target.files[0]) {
            if (!validateFileSize(event.target, 2, 'Profile picture')) {
                profilePicImg.src = originalImageSrc;
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicImg.src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    });

    const cvInput = profileForm.querySelector('input[name="cv"]');
    if (cvInput) {
        cvInput.addEventListener('change', (event) => {
            validateFileSize(event.target, 5, 'CV file');
        });
    }

    const portfolioInput = profileForm.querySelector('input[name="portfolio"]');
    if (portfolioInput) {
        portfolioInput.addEventListener('change', (event) => {
            validateFileSize(event.target, 10, 'Portfolio file');
        });
    }

    const govIdInput = profileForm.querySelector('input[name="government_id"]');
    if (govIdInput) {
        govIdInput.addEventListener('change', (event) => {
            validateFileSize(event.target, 2, 'Government ID');
        });
    }

    profileForm.addEventListener('submit', function(event) {
        // Validate all file inputs before submission
        let isValid = true;
        
        if (profilePicInput.files && profilePicInput.files[0]) {
            isValid = validateFileSize(profilePicInput, 2, 'Profile picture') && isValid;
        }
        if (cvInput && cvInput.files && cvInput.files[0]) {
            isValid = validateFileSize(cvInput, 5, 'CV file') && isValid;
        }
        if (portfolioInput && portfolioInput.files && portfolioInput.files[0]) {
            isValid = validateFileSize(portfolioInput, 10, 'Portfolio file') && isValid;
        }
        if (govIdInput && govIdInput.files && govIdInput.files[0]) {
            isValid = validateFileSize(govIdInput, 2, 'Government ID') && isValid;
        }
        
        if (!isValid) {
            event.preventDefault();
            return false;
        }

        profileForm.querySelectorAll('input[type="text"], input[type="tel"]').forEach(input => {
            const displayElement = input.closest('li').querySelector('.value');
            if (displayElement) {
                displayElement.textContent = input.value || '[Not Provided]';
            }
        });

        checkVerificationStatus();
        toggleEditMode(false);
    });

    checkVerificationStatus();
});
</script>

</body>
</html>

