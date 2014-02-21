
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

