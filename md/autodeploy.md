#DEPLOY


## How To Set Up Automatic Deployment with Git with a VPS

1. Check for git installation

2. server directory - ```/var/www/laravel/```
  git directory - ```/var/www/repos/laravel.git```

3. in git repository folder initialize git without source files: ```git init --bare```

### Hooks
Folder now have some possible action to perform to you.

4. In repository 

```bash
cd hooks
```

```bash
cat > post-receive
```

```bash
#!/bin/sh
git --work-tree=/var/www/laravel --git-dir=/var/www/repos/laravel.git checkout -f
```
Type *ctrl+d* to save. Give correct permissions.

```bash
chmod +x post-receive
```