# 🚀 Hướng Dẫn Đưa Dự Án Lên GitHub

## 📋 Chuẩn Bị

### 1. Kiểm Tra Git
```bash
git --version
```

Nếu chưa có Git, tải tại: https://git-scm.com/

### 2. Cấu Hình Git (Lần đầu)
```bash
git config --global user.name "Tên của bạn"
git config --global user.email "email@example.com"
```

---

## 🎯 Các Bước Đưa Lên GitHub

### Bước 1: Khởi Tạo Git Repository

```bash
cd laravel-learning-project

# Khởi tạo git (nếu chưa có)
git init

# Kiểm tra status
git status
```

### Bước 2: Thêm Files Vào Git

```bash
# Thêm tất cả files
git add .

# Hoặc thêm từng file/folder
git add README.md
git add app/
git add resources/
```

### Bước 3: Commit Changes

```bash
git commit -m "Initial commit: Laravel Blog project with full CRUD and API"
```

### Bước 4: Tạo Repository Trên GitHub

1. Đăng nhập vào GitHub: https://github.com
2. Click nút **"+"** góc trên bên phải
3. Chọn **"New repository"**
4. Điền thông tin:
   - **Repository name**: `laravel-blog` (hoặc tên bạn muốn)
   - **Description**: "Laravel Blog - Dự án học Laravel với CRUD và API"
   - **Public** hoặc **Private**
   - **KHÔNG** check "Initialize with README" (vì đã có)
5. Click **"Create repository"**

### Bước 5: Kết Nối Với GitHub

GitHub sẽ hiển thị hướng dẫn. Copy và chạy:

```bash
# Thêm remote repository
git remote add origin https://github.com/your-username/laravel-blog.git

# Đổi tên branch thành main (nếu cần)
git branch -M main

# Push code lên GitHub
git push -u origin main
```

---

## 🔐 Xác Thực GitHub

### Option 1: HTTPS với Personal Access Token

1. Vào GitHub Settings → Developer settings → Personal access tokens
2. Generate new token (classic)
3. Chọn scopes: `repo`, `workflow`
4. Copy token
5. Khi push, dùng token làm password

### Option 2: SSH Key

```bash
# Tạo SSH key
ssh-keygen -t ed25519 -C "your_email@example.com"

# Copy public key
cat ~/.ssh/id_ed25519.pub

# Thêm vào GitHub Settings → SSH and GPG keys
```

Sau đó dùng SSH URL:
```bash
git remote set-url origin git@github.com:your-username/laravel-blog.git
```

---

## 📝 Các Lệnh Git Thường Dùng

### Kiểm Tra Status
```bash
git status
```

### Xem Thay Đổi
```bash
git diff
```

### Thêm Files
```bash
# Thêm tất cả
git add .

# Thêm file cụ thể
git add README.md

# Thêm folder
git add app/
```

### Commit
```bash
# Commit với message
git commit -m "feat: thêm tính năng search"

# Commit tất cả thay đổi
git commit -am "fix: sửa lỗi pagination"
```

### Push Lên GitHub
```bash
# Push lần đầu
git push -u origin main

# Push lần sau
git push
```

### Pull Từ GitHub
```bash
git pull origin main
```

### Xem Lịch Sử
```bash
git log

# Xem ngắn gọn
git log --oneline

# Xem graph
git log --graph --oneline --all
```

---

## 🌿 Làm Việc Với Branches

### Tạo Branch Mới
```bash
# Tạo và chuyển sang branch mới
git checkout -b feature/search

# Hoặc
git branch feature/search
git checkout feature/search
```

### Xem Branches
```bash
git branch
```

### Chuyển Branch
```bash
git checkout main
```

### Merge Branch
```bash
# Chuyển về main
git checkout main

# Merge feature branch
git merge feature/search
```

### Xóa Branch
```bash
# Xóa local branch
git branch -d feature/search

# Xóa remote branch
git push origin --delete feature/search
```

---

## 🔄 Cập Nhật Dự Án

### Workflow Thông Thường

```bash
# 1. Kiểm tra status
git status

# 2. Pull code mới nhất
git pull origin main

# 3. Tạo branch mới cho feature
git checkout -b feature/new-feature

# 4. Code và test

# 5. Add và commit
git add .
git commit -m "feat: thêm feature mới"

# 6. Push branch lên GitHub
git push origin feature/new-feature

# 7. Tạo Pull Request trên GitHub

# 8. Sau khi merge, cập nhật main
git checkout main
git pull origin main

# 9. Xóa branch cũ
git branch -d feature/new-feature
```

---

## 🚫 Files Không Nên Commit

File `.gitignore` đã được cấu hình để ignore:

- `/vendor` - Composer dependencies
- `/node_modules` - NPM dependencies
- `.env` - Environment variables (có thông tin nhạy cảm)
- `/storage/*.key` - Keys
- `*.log` - Log files
- `.DS_Store`, `Thumbs.db` - OS files

### Nếu Đã Commit Nhầm

```bash
# Xóa file khỏi Git nhưng giữ trong local
git rm --cached .env

# Commit thay đổi
git commit -m "chore: remove .env from git"

# Push
git push
```

---

## 🔧 Troubleshooting

### Lỗi: "fatal: not a git repository"
```bash
git init
```

### Lỗi: "remote origin already exists"
```bash
git remote remove origin
git remote add origin https://github.com/your-username/laravel-blog.git
```

### Lỗi: "failed to push some refs"
```bash
# Pull trước khi push
git pull origin main --rebase
git push origin main
```

### Lỗi: "Permission denied (publickey)"
```bash
# Kiểm tra SSH key
ssh -T git@github.com

# Nếu không có, tạo SSH key mới
ssh-keygen -t ed25519 -C "your_email@example.com"
```

### Undo Commit Cuối
```bash
# Giữ changes
git reset --soft HEAD~1

# Xóa changes
git reset --hard HEAD~1
```

### Xem Remote URL
```bash
git remote -v
```

### Đổi Remote URL
```bash
git remote set-url origin https://github.com/new-username/laravel-blog.git
```

---

## 📦 Chuẩn Bị Trước Khi Push

### Checklist

- [ ] Đã test kỹ code
- [ ] Đã xóa debug code
- [ ] Đã cập nhật README.md
- [ ] Đã kiểm tra .gitignore
- [ ] Không commit file .env
- [ ] Không commit /vendor
- [ ] Commit messages rõ ràng
- [ ] Code đã format đẹp

### Kiểm Tra Files Sẽ Commit

```bash
git status
git diff
```

---

## 🎨 Làm Đẹp Repository

### 1. README.md Đẹp
- ✅ Badges (Laravel version, PHP version, License)
- ✅ Screenshots
- ✅ Clear installation instructions
- ✅ API documentation
- ✅ Contributing guidelines

### 2. Thêm Topics
Trên GitHub repository page:
- Settings → Topics
- Thêm: `laravel`, `php`, `crud`, `api`, `blog`, `learning`

### 3. Thêm Description
Trên GitHub repository page:
- Click ⚙️ Settings
- Thêm description và website

### 4. Enable Issues & Discussions
- Settings → Features
- Check "Issues" và "Discussions"

---

## 🌟 Sau Khi Push

### 1. Kiểm Tra Trên GitHub
- Vào https://github.com/your-username/laravel-blog
- Kiểm tra files đã được push
- Xem README.md hiển thị đẹp không

### 2. Tạo Release (Optional)
- Releases → Create a new release
- Tag: `v1.0.0`
- Title: "Initial Release"
- Description: Mô tả version

### 3. Share
- Share link với bạn bè
- Post lên social media
- Thêm vào portfolio

---

## 📚 Tài Nguyên

- [Git Documentation](https://git-scm.com/doc)
- [GitHub Guides](https://guides.github.com/)
- [Git Cheat Sheet](https://education.github.com/git-cheat-sheet-education.pdf)
- [Conventional Commits](https://www.conventionalcommits.org/)

---

## 💡 Tips

1. **Commit thường xuyên** - Nhỏ và rõ ràng
2. **Pull trước khi push** - Tránh conflicts
3. **Dùng branches** - Không code trực tiếp trên main
4. **Viết commit messages tốt** - Giúp người khác hiểu
5. **Review code trước khi commit** - `git diff`

---

**Happy Git-ing! 🚀**
