
  
#!/bin/bash
GIT_DIR=$(git rev-parse --git-dir)
echo "Remove existing hooks…"
rm $GIT_DIR/hooks/pre-commit
rm $GIT_DIR/hooks/pre-push
echo "Installing hooks…"
ln -s ../../scripts/git-hooks/pre-commit $GIT_DIR/hooks/pre-commit
ln -s ../../scripts/git-hooks/pre-push $GIT_DIR/hooks/pre-push
echo “Done!”