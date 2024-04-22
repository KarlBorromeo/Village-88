require_relative 'developer'
class Senior < Developer
    def initialize
        super
        @knowledge = 90
    end
    def interview
        @time -= 0.5
        self
    end
    protected
    def assign
        @time += 2
        self
    end
end
sen = Senior.new.showStats

