 #!/bin/bash
 
BASE_URL="https://raw.githubusercontent.com/m-j-smith/laravel-ci-config/main"
 
echo "Setting up Laravel CI config..."
 
mkdir -p .github/workflows
 
curl -s "$BASE_URL/stubs/workflows/ci.yml" -o .github/workflows/ci.yml
curl -s "$BASE_URL/pint.json" -o pint.json
 
echo ""
echo "Done! Files added:"
echo "  .github/workflows/ci.yml"
echo "  pint.json"
echo ""
echo "Next steps:"
echo "  1. Ensure DB_CONNECTION=sqlite is set in your .env.example"
echo "  2. Ensure phpunit.xml has DB_CONNECTION=sqlite and is uncommented"
echo "  3. Ensure phpunit.xml has DB_DATABASE=:memory: and is uncommented"
echo "  4. Push to GitHub and check the Actions tab"