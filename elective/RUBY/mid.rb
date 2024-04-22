require_relative 'senior'
class Mid < Senior
    def initialize
        super
        @knowledge = 85
    end
    def pair_programming
        @time -= 3
        @energy -= 3
        self
    end
    def break
        @energy = 100
    end
end

mid = Mid.new.showStats