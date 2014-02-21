
install: clean styles
	@composer install

test:
	@phpunit

clean-test:
	@rm -rf report

coverage:
	@phpunit --coverage-html ./report

report: coverage
	@open ./report/index.html

clean: clean-test
	@rm -rf vendor
	@rm -f composer.lock
	@rm -rf public/css

styles:
	@compass compile --force

symlink-dev:
	# http://stackoverflow.com/questions/2826029/passing-additional-variables-from-command-line-to-make
	# @TODO: Remove the given directory's vendor file of this package
	# @TODO: Symlink this to the given directory's vendor file
